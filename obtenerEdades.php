<?php  
require_once('general.php');






function obtenerEdades($edades){
    // $edades = intval($edades); // Convertir a entero
  $curl = curl_init();
//   echo "a ver si busca el juego ".$edades;
  $query = "fields *; where id = ".$edades.";"; // Construir la cadena de consulta
// $query = "fields name; where id=1;"; // Construir la cadena de consulta

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.igdb.com/v4/age_ratings',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    // CURLOPT_POSTFIELDS =>'search "Halo" ; fields *; 
CURLOPT_POSTFIELDS => $query,
    CURLOPT_HTTPHEADER => array(
      'Client-ID: 6qvxbbsaj6fa9qtvfughtzr3stz1th',
      'Authorization: Bearer wm53dcikhlczw4ou0bne5mxg5qr3x2',
      'X-Requested-With: XMLHttpRequest',
      'Content-Type: application/json',
      'Cookie: __cf_bm=IwbiAEgqek0xz.rzEv4hiQyS0lTc4m4.OX6MdsTwr.s-1695141951-0-AT4JH1iDtvi0bkgmlJALEKplMMLOk3/HsW6gZ5abIkJTesOUDdi+0Q9xGHXEvQYisfkd83cxgtefjqmeR4P/Kv0='
    ),
  ));
  
  $response = curl_exec($curl);

  curl_close($curl);

  $data = json_decode($response, true);





// echo "Datos del JSON EN LA la FUNCION DE OBTENER Perspectiva:\n";

// echo ("Categorias ->");
//  print_r($data);
//  echo ("<- Categorias");
if($data[0]["category"] !== 2){

  // echo "<li class='list-group-item'><strong>Edades: </strong> No hay edad PEGI</li>";
  
// echo ("No hay categoria PEGI");

}else{
  if ($data[0]["rating"] == 1){

echo "<li class='list-group-item'><strong>Edades: </strong> 3 Años</li>";


  }else if ($data[0]["rating"] == 2){



    echo "<li class='list-group-item'><strong>Edades: </strong> 7 Años</li>";

  }else if ($data[0]["rating"] == 3){

    echo "<li class='list-group-item'><strong>Edades: </strong> 12 Años</li>";



  }else if ($data[0]["rating"] == 4){ 


    echo "<li class='list-group-item'><strong>Edades: </strong> 16 Años</li>";

  }else if ($data[0]["rating"] == 5){



    echo "<li class='list-group-item'><strong>Edades: </strong> 18 Años</li>";
  }else{


    echo "<li class='list-group-item'><strong>Edades: </strong> No hay edad PEGI</li>";

  }


//   $cara3=$data[0]["rating"];
//   foreach($cara3 as $cara2){
//       if (isset($cara2["rating"]) && is_array($cara2["rating"])) {
//           echo implode(', ', $cara2["rating"]);
//       } else {
//           echo "No disponible"; // o algún otro mensaje de tu elección
//       }
//      print_r("PLAYER_PERSPECTIVE: ");
//      print_r($cara2[0]["name"]);
//     global $edades3;
//     // $edades3=$cara2["name"];
//     $edades3=$cara3;
//     $html2 ="<li class='list-group-item'><strong>PEGI: </strong>".$edades3."</li>";
  
//   //     // Imprimir el HTML resultante
//   echo $html2;

// }



// ##############################################
// $cara2=$data[0]["category"];
// // foreach($data as $cara2){
//     // if (isset($cara2["player_perspectives"]) && is_array($cara2["player_perspectives"])) {
//     //     echo implode(', ', $cara2["player_perspectives"]);
//     // } else {
//     //     echo "No disponible"; // o algún otro mensaje de tu elección
//     // }
//   //  print_r("PLAYER_PERSPECTIVE: ");
// //    print_r($cara2[0]["name"]);
//   global $edades2;
// //   $edades2=$cara2["name"];
//   $edades2=$cara2;
//   $html2 ="<li class='list-group-item'><strong>edades2: </strong>".$edades2."</li>";

// //     // Imprimir el HTML resultante
// echo $html2;

};






return $data;


};















?>