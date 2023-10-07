<?php     


include 'obtenerdatos.php'; 
// require('obtenerdartos.php')


// $texto_a_traducir = $data['summary'];
// $idioma_destino = 'en';


// Supongamos que tienes un JSON con un campo llamado 'texto' que contiene el texto que deseas traducir.
// Puedes reemplazar esto con tus propios datos.
$json_data = $response

echo $response

// Decodifica el JSON para acceder al texto
$data = json_decode($json_data, true);
$texto_a_traducir = $data['texto'];

// Define el idioma al que deseas traducir (por ejemplo, al inglés 'en')
$idioma_destino = 'es';

// URL de la API de Google Translate
$api_url = "https://translation.googleapis.com/language/translate/v2?key=TU_API_KEY";

// Parámetros de la solicitud POST
$data = array(
    'q' => $texto_a_traducir,
    'target' => $idioma_destino,
);

// Inicializa cURL para hacer la solicitud POST a la API de Google Translate
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Realiza la solicitud y obtiene la respuesta
$response = curl_exec($ch);

// Cierra la conexión cURL
curl_close($ch);

// Decodifica la respuesta JSON
$response_data = json_decode($response, true);

// Extrae el texto traducido
$texto_traducido = $response_data['data']['translations'][0]['translatedText'];

// Imprime el resultado
echo "Texto original: $texto_a_traducir\n";
echo "Texto traducido al $idioma_destino: $texto_traducido\n";




?>