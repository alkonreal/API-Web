<?php  
require_once('general.php');






function obtenerPlataforma($plataformas){
    // $plataformas = intval($plataformas); // Convertir a entero
  $curl = curl_init();
//   echo "a ver si busca el juego ".$plataformas;
  $query = "fields name; where id = ".$plataformas.";"; // Construir la cadena de consulta
// $query = "fields name; where id=1;"; // Construir la cadena de consulta

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.igdb.com/v4/platforms',
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


//  print_r($data);


// ##############################################
$cara2=$data[0]["name"];
// foreach($data as $cara2){
    // if (isset($cara2["player_perspectives"]) && is_array($cara2["player_perspectives"])) {
    //     echo implode(', ', $cara2["player_perspectives"]);
    // } else {
    //     echo "No disponible"; // o algún otro mensaje de tu elección
    // }
  //  print_r("PLAYER_PERSPECTIVE: ");
//    print_r($cara2[0]["name"]);
  global $plataformas;
//   $plataformas=$cara2["name"];
  $plataformas=$cara2;
  $html2 ="<li class='list-group-item'><strong>Plataformas: </strong>".$plataformas."</li>";

//     // Imprimir el HTML resultante
echo $html2;

// };






return $data;


};















?>