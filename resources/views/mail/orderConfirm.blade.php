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
       <h1>Ottima Scelta, {{ $client -> name }}</h1>
       <hr>
       <h3>Dettagli ordine</h3>
       <strong>{{ $client -> name }} {{ $client -> lastname}}</strong>
       <p>{{ $client -> phone}}</p>
       <hr>
       

       <h1>Ecco la tua ricevuta <br> Numero dell'ordine: {{ $client -> id }}</h1><br><br>
      <table width = "100%">
         
         <tr>
            <td>
               <table width = "100%">
                
                  <tr>
                     <td>Prezzo Totale</td>
                     <td>{{ $client -> prize }}</td>
                  </tr>
                 
               </table>
            </td>
         </tr>
         
      </table>
   </body>
	
</html>