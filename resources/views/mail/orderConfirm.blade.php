<!DOCTYPE html>
<html>

   <head>
      <title>Email ordine</title>
      <style>
          *{
              text-align: center;
          }
      </style>
   </head>
	
   <body>
       <h1>Dettagli ordine</h1>
       <strong>Nome: {{ $data["name"] }} {{ $data["lastname"]}}</strong>
       <p>Numero di telefono: {{ $data["phone"]}}</p>
       <hr>

       <div>
          numero ordine: {{ $orderNumber }}
       </div>
       <br>
       <br>
       <table width = "100%">
          <tbody>
            @foreach ($cart as $product)
               <tr>
                  <td>
                     Nome: {{ $product["name"] }}
                  </td> 
                  <td>
                     Quantit&agrave;: {{ $product["quantity"] }}
                  </td> 
                  <td>
                     Prezzo: {{ $product["price"] }}
                  </td>
               </tr>
             @endforeach
          </tbody>
       </table>
       <br>
       <br>
       <table width = "100%">
          
          
          <tr>
            <td>
               <table width = "100%">
                
                  <tr>
                     <td>Prezzo Totale</td>
                     <td>{{ $data["total_price"] }} &euro;</td>
                  </tr>
                 
               </table>
            </td>
         </tr>
         
      </table>
   </body>
	
</html>