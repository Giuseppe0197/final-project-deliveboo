<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $orderNumber;

    public function __construct($datas) {

        $this->data = $datas;
        $this->orderNumber = rand(1, 999);
    }
    
    public function build() {
        
        $cart = session("cart");

        return $this->from('deliveboo@mail.com')
            ->view('mail.orderConfirm', compact('cart'));
    }
}
