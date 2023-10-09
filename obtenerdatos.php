<?php

require_once('obtenerCaratula.php');

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
// print_r("Json recogido del juego introducido en juego: ");
  // print_r($data);

  // $coverURL = $data[0]['cover']['url'];
  // print_r("PUTA CARATULA");
  // print_r($coverURL);
  // print_r("PUTA CARATULA2");

// Aquí lo que hace es coger el ID que sale en COVER y pasar ese ID para que lo busque 
// la función de obtener caratula con la variable $coverURL




//  SIN FOREACH SOLO ME PUEDE MOSTAR UN JUEGO:
// //  Para obtener los datos del cover
//   $coverURL = $data[0]['cover'];

//   // ########################################
//   //Para convertir esto en STRING
//   // $coverURL = json_encode($game['cover']);
//   // #############################################


//   print_r("tocate los webos");
//   print_r($coverURL);
//   // llama a esta funcion con los datos obtenidos en >$coverURL
//   global $joder;
//   $joder= obteneresacosa($coverURL);
//   print_r("OSTIA");
//   print_r($joder[0]["url"]);
// //   $html = '<div><img src="' . $joder[0]["url"]. '" alt="Carátula del juego"></div>';

// // //     // Imprimir el HTML resultante
// // echo $html;
//   // Se procesa la función de obteneresacosa y devuelve la URL que se busca en la función
//   print_r("PUTA CARATULA2");







// TODO LO ANTERIOR EN UN FOREACH desde la linera 74 hasta la 96

// foreach($data as $game){
//   //  Para obtener los datos del cover
//     $coverURL = $game['cover'];
  
//     // ########################################
//     //Para convertir esto en STRING
//     // $coverURL = json_encode($game['cover']);
//     // #############################################
  
  
//     print_r("tocate los webos");
//     print_r($coverURL);
//     // llama a esta funcion con los datos obtenidos en >$coverURL
//     global $joder;
//     $joder= obteneresacosa($coverURL);
//     print_r("OSTIA");
//     print_r($joder[0]["url"]);
//   //   $html = '<div><img src="' . $joder[0]["url"]. '" alt="Carátula del juego"></div>';
  
//   // //     // Imprimir el HTML resultante
//   // echo $html;
//     // Se procesa la función de obteneresacosa y devuelve la URL que se busca en la función
//     print_r("PUTA CARATULA2");
  

//   };
  
 
//   print_r($coverURL);
 
//   print_r($lacaratula);
// print_r(" TODOS LOS PUTOS DATOS DE DATA");
// print_r($data);



foreach ($data as $tururu)

echo "<h2>Información del Juego ANTES FUNCION</h2>";
echo "<p><strong>ID:</strong> " . $tururu['id'] . "</p>";
echo "<p><strong>Nombre:</strong> " . $tururu['name'] . "</p>";
echo "<p><strong>Cover:</strong> " . $tururu['cover'] . "</p>";
echo "<p><strong>Cover:</strong> " . $tururu['cover'] . "</p>";
// print_r($data);
print_r($joder[0]["url"]);
return $data;

}
// Todo lo que está almacenado en la varibale $Juego luego es introducido en la funcion ObtenerDatos
// pero introduciendo esos datos en la variable $juegoABuscar y así saber que buscar
// Luego lo que esté almacenado en $resultado, saldrá en el HTML
$resultado = obtenerDatos($juego);






function mostrarInformacionJuego($resultado) {
  echo "<h2>Información del Juego</h2>";
  echo "<p><strong>ID:</strong> " . $resultado[0]['id'] . "</p>";
  echo "<p><strong>Nombre:</strong> " . $resultado[0]['name'] . "</p>";
  echo "<p><strong>Cover:</strong> " . $resultado[0]['cover'] . "</p>";
  echo "<p><strong>Cover:</strong> " . $resultado[0]['cover'] . "</p>";

  
}



// print_r("Json recogido del juego introducido en juego: ");
// print_r($resultado);
// Con RESULTADO, lo que hacemos es que luego se pinten todos los datos del juego

// $resultado2 = obteneresacosa($juego);


// // ############################################################################################
// Aquí sacamos los datos almacenados del juego de manera local
// $juego2 = str_replace(' ', '', $juego);

// echo "a ver ahora ".$juego2;
// $jsonFilePath = $juego2.'.json' ;
// // Mostrar la ruta de donde está el JSON
// echo $jsonFilePath;
// $jsonData = file_get_contents($jsonFilePath);
// $encasa = json_decode($jsonData, true);

// echo "Datos del JSON:\n";
// print_r($encasa);

// if ($encasa !== null) {
//   // Inicializa un array para almacenar los valores de "COVER"
//   $covers = array();


//   // Recorre cada objeto en el array
//   foreach ($encasa as $item) {
//       // Verifica si el campo "COVER" está presente en el objeto
//       if (isset($item['cover'])) {
//           // Agrega el valor de "COVER" al array de "covers"
//           $covers[] = $item['cover'];
//       }
//   };



//    // Ahora, puedes recorrer el array de "covers" según tus necesidades
//    foreach ($covers as $cover) {
   
//     echo "COVER: $cover\n" . PHP_EOL;
//     // $resultado2 = obteneresacosa($cover);
   
// }
// } else {
// echo "Error al decodificar el JSON." . PHP_EOL;
// };





// Pruebas


// array

// $caratulasid=["86963","221564","267803"];


// foreach($caratulasid as $caratula){


// echo "PUTA CARATULA ".$caratula;

// };




// $datosJuego = obtenerDatos($juego);
// $datosURL = obteneresacosa($cover);


// $datoscombinados = $datosJuego.$datosURL;









?>