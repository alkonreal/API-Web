<?php 


 
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
      'Authorization: Bearer fdtxfdku5kgsc0v23033btep1ahl4w',
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

return $data;

}
// Todo lo que está almacenado en la varibale $Juego luego es introducido en la funcion ObtenerDatos
// pero introduciendo esos datos en la variable $juegoABuscar y así saber que buscar
// Luego lo que esté almacenado en $resultado, saldrá en el HTML
$resultado = obtenerDatos($juego);




?>