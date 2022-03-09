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
       <h1>Ottima Scelta, {{ $data["name"] }}</h1>
       <hr>
       <h3>Dettagli ordine</h3>
       <strong>{{ $data["name"] }} {{ $data["lastname"]}}</strong>
       <p>{{ $data["phone"]}}</p>
       <hr>

       <div>
          numero ordine: {{ $orderNumber }}
       </div>
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