<?php
 
namespace App\Http\Controllers;

use App\Client;
use App\Dish;
use App\Mail\OrderConfirm;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe;
 
class StripeController extends Controller
{
    public function stripe() {
        return view('pages.homepage');
    }

    public function payStripe(Request $request) {

        $cart = session("cart"); // carrello

        $datas = $request->all();

        $clientEmail = $request->email; // email del cliente
        $totalPrice = $request->total_price; // prezzo totale carrello

        // Sostituisco la , con il . in modo che faccia il calcolo corretto stripe.
        $tot = str_replace(',', '.', $totalPrice);

        // Validazione dati per il cliente
        $data = $request->validate([
            'name'=> 'required|string|max:60',
            'lastname'=> 'required|string|max:60',
            'address'=> 'required|string',
            'email'=> 'required|email',
            'phone'=> 'required|string|max:20',
        ]);

        $client = Client::create($data);  // creazione del cliente

        // Creazione ordine nel Database
        $order = Order::create([
            'total_price' => $totalPrice,
            'payment_status' => 0,
            'date' => date(now()),
            'client_id' => $client->id, // associato il cliente all'ordine
        ]);

        // Ciclo nell'array del carrello
        foreach ($cart as $value) {

            // Tabella pivot (order_dishes).
            $order->dishes()->attach($order->id, [
                'dish_quantity' => $value["quantity"], 
                'dish_id' => $value["id"],
            ]);
        }


        // Validazione dati per il pagamento
        $this->validate($request, [
            'card_no' => 'required',
            'expiry_month' => 'required',
            'expiry_year' => 'required',
            'cvv' => 'required',
        ]);
 
        $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $response = \Stripe\Token::create(array(
                "card" => array(
                    "number"    => $request->input('card_no'),
                    "exp_month" => $request->input('expiry_month'),
                    "exp_year"  => $request->input('expiry_year'),
                    "cvc"       => $request->input('cvv')
                )));
            if (!isset($response['id'])) {
                return redirect()->route('addmoney.paymentstripe');
            }
            $charge = \Stripe\Charge::create([
                'card' => $response['id'],
                'currency' => 'eur',
                'amount' =>  $tot * 100, // prezzo totale del carrello
                'description' => 'wallet',
            ]);
 
            if($charge['status'] == 'succeeded') {

                // Se l'ordine è andato a buon fine, lo stato del pagamento sarà 1
                $order['payment_status'] = 1;
                $order->update(); // update tabella ordini

                Mail::to($clientEmail) -> send(new OrderConfirm($datas));

                return redirect('/')->with('success', 'Pagamento avvenuto con successo!');
 
            } else {

                // Se l'ordine è andato a buon fine, lo stato del pagamento sarà 0
                $order['payment_status'] = 0;
                $order->update(); // update tabella ordini

                return redirect('/')->with('error', 'qualcosa è andato storto!');
            }
 
        }
        catch (Exception $e) {
            return $e->getMessage();
        }
 
    }
}
?>
