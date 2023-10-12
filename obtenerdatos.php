<?php

require_once('general.php');

// Obtener datos del campo de busqueda

// Inicializa la variable $juego
$juego = '';

// Verifica si el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Verifica si se ha enviado un valor para el campo de texto "texto"
    if (isset($_POST["texto"])) {
        // Guarda el valor en la variable $juego
        $juego = $_POST["texto"];
         // Elimina espacios en blanco del valor (si es necesario)
        //  $juego = str_replace(' ', '', $juego);
    }
}


// ##############;################################################################

 
function obtenerDatos($juegoABuscar){
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.igdb.com/v4/games',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    // CURLOPT_POSTFIELDS =>'search "Halo" ; fields *; 
    CURLOPT_POSTFIELDS => 'search "' . $juegoABuscar . '" ; fields *;  ',

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
// Se guarda un Json con toda la informacion del campo de busqueda del formulario pero sin espacios
$entradaLimpia = preg_replace('/[^A-Za-z]/', '', $juegoABuscar);

// Imprimir la cadena resultante
echo "Nombre del juego sin espacios: ".$entradaLimpia;

   $jsonFileName = $entradaLimpia.'.json' ;
   echo "Ruta donde esta el juego: ".$jsonFileName;
   file_put_contents($jsonFileName, $response);

  $data = json_decode($response, true);

  // print_r("Hay algo dentro de PLAYER PÊRSPECTIVE?:\n");
  // print_r($data);

  // PRUEBAS
// ################################

// $ID=$data[0]["id"];
// $nombre=$data[0]["name"];
// print_r("URL dentro de la peticion:\n");
// // print_r($ID);
// print_r("Hay algo dentro?:\n");
// // Con esto si  que muestra la imagen individualmente, pero no como
// global $html;
// $html = "<p><strong>ID:</strong> " . $ID . "</p>";
// echo "<p><strong>ID o NO:</strong> " . $ID . "</p>";

//     // Imprimir el HTML resultante
// echo $html;



// $html2= "<p><strong>ID:</strong> " . $nombre . "</p>";
// echo $html2;
// echo "<br>\n";


// foreach ($ID as $tururu){

// echo "<h2>Información del Juego ANTES FUNCION</h2>";
// echo "<p><strong>ID:</strong> " . $tururu['id'] . "</p>";




// };
// // PRUEBAS 2

 // Verificar si el campo "player_perspectives" existe
 if (isset($data[0]['player_perspectives'])) {
  // Comprobar si "player_perspectives" es un array
  if (is_array($data[0]['player_perspectives'])) {
      $playerPerspectives = $data[0]['player_perspectives'];

      // Ahora, $playerPerspectives contiene un array de objetos

      if (!empty($playerPerspectives)) {
          // Puedes iterar a través de los objetos en $playerPerspectives
          foreach ($playerPerspectives as $perspective) {
              // $perspective contiene un objeto con información sobre una perspectiva de jugador
              // Puedes acceder a las propiedades del objeto según tus necesidades
              echo "Nombre: " . $perspective['name'] . "<br>";
          }
      } else {
          echo "No se encontraron perspectivas de jugador en el JSON.";
      }
  } else {
      echo "El campo 'player_perspectives' no es un array en el JSON.";
  }
} else {
  echo "El campo 'player_perspectives' no está presente en el JSON.";
}


// $playerPerspectives = $data[0]['player_perspectives'];
// print_r("VA O NO VA");
// print_r($playerPerspectives);


// foreach ($playerPerspectives as $perspective) {
//   // $perspective contiene un objeto con información sobre una perspectiva de jugador
//   // Puedes acceder a las propiedades del objeto según tus necesidades
//   echo "Nombre: " . $perspective['name'] . "<br>";
// }

// foreach($data as $ninu){

//   print_r("Perspectiva ID: ");
//   print_r($ninu["player_perspectives"]);
  
//   $perspectivas2=$ninu["player_perspectives"];
//   print_r("SERA SERA \n");
//   print_r($perspectivas2);
//   print_r("SERA SERA DEL DOS \n");


// foreach($perspectivas2 as $venga){
//   print_r("VENGA");
//   print_r($venga);



// };


// };
// ######################################################


// #################################


foreach ($data as $cara){

  print_r("Caratula ID: ");
  print_r($cara["cover"]);
  global $caratula;
  $caratula=$cara["cover"];
  // obteneresacosa($caratula);
  

};

// ############################################

// $caratula= $data[0]['cover'];
// print_r("Caratula ID: ");
// print_r($caratula);

  return $data;

};

// Todo lo que está almacenado en la varibale $Juego luego es introducido en la funcion ObtenerDatos
// pero introduciendo esos datos en la variable $juegoABuscar y así saber que buscar
// Luego lo que esté almacenado en $resultado, saldrá en el HTML
$resultado = obtenerDatos($juego);








?>