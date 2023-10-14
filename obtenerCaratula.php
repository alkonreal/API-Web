<?php 

require_once('general.php');







function obteneresacosa($joder){
    // $joder = intval($joder); // Convertir a entero
  $curl = curl_init();
//   echo "a ver si busca el juego ".$joder;
  $query = "fields image_id; where id = " . $joder.";"; // Construir la cadena de consulta
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.igdb.com/v4/covers',
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





echo "Datos del JSON EN LA la FUNCION DE OBTENER CARATULA:\n";


// print_r($data);


global $coverURL2;
// Obtenemos la URL ( o el image_id) dentro del ARRAY (EJEMPLO)
// Array ( [0] => Array
//  ( [id] => 76903 
// [url] => //images.igdb.com/igdb/image/upload/t_thumb/co1nc7.jpg ) )

// PRUEBAS
// ##############################################

foreach($data as $cara2){


  // print_r("URL : ");
  // print_r($cara2["url"]);
  global $caratula2;
  $caratula2=$cara2["image_id"];
  // antigua manera
  // $html2 = '<div><img   id="caratula"   class="card-img-top"; src="' . $caratula2 . '" alt="Carátula del juego"></div>';
// Nueva manera
  $html2 = '<div><img   id="caratula"   class="card-img-top;img-fluid"; src="https://images.igdb.com/igdb/image/upload/t_cover_big/' . $caratula2 . '.png" alt="Carátula del juego"></div>';

//     // Imprimir el HTML resultante
echo $html2;

};




// #################################################


// $coverURL2=$data[0]["url"];
// print_r("URL dentro de la peticion:\n");
// print_r($coverURL2);
// print_r("Hay algo dentro?:\n");
// // Con esto si  que muestra la imagen individualmente, pero no como
// global $html;
// $html = '<div><img src="' . $coverURL2 . '" alt="Carátula del juego"></div>';

// //     // Imprimir el HTML resultante
// echo $html;
// // echo "<br>\n";






return $data;


};
// Todo lo que está almacenado en la varibale $Juego luego es introducido en la funcion obteneresacosa
// pero introduciendo esos datos en la variable $juegoABuscar y así saber que buscar
// Luego lo que esté almacenado en $resultado, saldrá en el HTML
// $resultado2 = obteneresacosa($caratula);




// echo "Datos del JSON despues de la funcion:\n";
// print_r($resultado2);









// // ########################################################################################











 ?>