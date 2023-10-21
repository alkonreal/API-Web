<?php  
require_once('general.php');





function veamos($platas){


$jsonFilePath = 'platforms.json';

// Verificar si el archivo existe
if (file_exists($jsonFilePath)) {
    // Cargar el contenido del JSON en un string
    $jsonString = file_get_contents($jsonFilePath);

    // Decodificar el JSON en un array asociativo
    $consoles = json_decode($jsonString,true);
//       print_r("TODO LO QUE HAY DENTRO DE PLATAS");
//  print_r($platas);

//  print_r($consoles['platforms'][0]['name']);




foreach($consoles['platforms'] as $console){
 
    $destino= $console['id'];
if($destino == $platas){   
//    print_r("SI ENCONTRO LA PLATAFORMA");
//    echo($destino);
//    echo($platas);


$name= $console['name'];
$url= $console['url'];
$alternative_name= $console['alternative_name'];


$html2 = "<img   id='caratula' style='width:25%;'  class='card-img-top;img-fluid'; src='img/logoPlatforms/$url.png' alt='$url'>";
                        
                                    //     // Imprimir el HTML resultante
                                  echo $html2;





}else{



   

}

}



}



};














?>