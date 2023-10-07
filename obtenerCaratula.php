<?php 

require_once('obtenerdatos.php');



// Obtener los datos de la variable que está en el formulario en HTML
// $valorRecibido = $_POST['texto']; 

// echo "que coño ".$valorRecibido;




// echo "Datos del JSON:JUEGO2\n";
// print_r($encasa);




// $juego3 ="100830";
// $juego3 = intval($juego3); // Convertir a entero
// echo "nose si cadena o integeter ".$juego3."\n";
// array

// $caratulasid=["86963","221564","267803"];


// foreach($caratulasid as $caratula){


// echo "LA CARATULA ".$caratula;
// //  obteneresacosa($caratula);
//  $resultado2 = obteneresacosa($caratula);



// //  $resultado3 = implode(", ", $resultado2);

// };








function obteneresacosa($juegoABuscar){
    // $juegoABuscar = intval($juegoABuscar); // Convertir a entero
  $curl = curl_init();
//   echo "a ver si busca el juego ".$juegoABuscar;
  $query = "fields url; where id = " . $juegoABuscar.";"; // Construir la cadena de consulta
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
// Se guarda un Json con toda la informacion del campo de busqueda del formulario pero sin espacios
// $entradaLimpia = preg_replace('/[^A-Za-z]/', '', $juegoABuscar);

// Imprimir la cadena resultante
// echo "Nombre del juego sin espacios: ".$entradaLimpia;

//    $jsonFileName = $juegoABuscar.'.json' ;
//    echo "Ruta donde esta el juego: ".$jsonFileName;
//    file_put_contents($jsonFileName, $response);

  $data = json_decode($response, true);




// CON ESTE CODIGO LO QUE HAGO ES MOSTAR PINTAR EN HTML
// EL DIV E IMG  DIRECTAMENTE....

//   // Comprobar si se encontraron datos
//   if (!empty($data)) {
//     // Obtener la URL de la imagen si existe
//     $imageUrl = isset($data[0]['url']) ? $data[0]['url'] : '';

//     // Crear la etiqueta <div> con la etiqueta <img> dentro
//     $html = '<div><img src="' . $imageUrl . '" alt="Carátula del juego"></div>';

//     // Imprimir el HTML resultante
//  echo $html;
// } else {
//     echo 'No se encontraron datos para la carátula del juego.';
// }

// return $data;
// }

echo "Datos del JSON EN LA la FUNCION DE OBTENER CARATULA:\n";


print_r($data);


global $coverURL2;

$coverURL2=$data[0]['url'];
print_r("URL dentro de la peticion:\n");
print_r($coverURL2);
print_r("Hay algo dentro?:\n");
// Con esto si  que muestra la imagen individualmente, pero no como quiero
global $html;
$html = '<div><img src="' . $coverURL2 . '" alt="Carátula del juego"></div>';

//     // Imprimir el HTML resultante
echo $html;
// echo "<br>\n";
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