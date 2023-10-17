<?php  
require_once('general.php');






$jsonFilePath = 'platforms.json';

// Verificar si el archivo existe
if (file_exists($jsonFilePath)) {
    // Cargar el contenido del JSON en un string
    $jsonString = file_get_contents($jsonFilePath);

    // Decodificar el JSON en un array asociativo
    $consoles = json_decode($jsonString, true);

    if ($consoles) {
        // Tu array de 5 números
        $juju2 = array(2, 4, 6, 8, 10);

        // Función que recorre los arrays
        function iterateArrays($juju2, $consoles) {
            echo "Recorriendo el array de 5 números: <br>";
            foreach ($juju2 as $number) {
                echo $number . "<br>";
            }

            echo "<br> Recorriendo el array de consolas: <br>";
            foreach ($consoles['consoles'] as $console) {
                echo "ID: " . $console["platforms"]['id'] . ", Name: " . $console['name'] . ", Alternative Name: " . $console['alternative_name'] . ", URL: " . $console['url'] . "<br>";
            }
        }

        // Llamando a la función
        iterateArrays($juju2, $consoles);
    } else {
        echo "Error al decodificar el JSON.";
    }
} else {
    echo "El archivo JSON no existe en la ruta especificada.";
}














?>