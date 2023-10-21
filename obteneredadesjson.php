<?php  
require_once('general.php');





function veamosedades($edad){


$jsonFilePath = 'edades.json';

// Verificar si el archivo existe
if (file_exists($jsonFilePath)) {
    // Cargar el contenido del JSON en un string
    $jsonString = file_get_contents($jsonFilePath);

    // Decodificar el JSON en un array asociativo
    $edades = json_decode($jsonString,true);
//       print_r("TODO LO QUE HAY DENTRO DE edad");
//  print_r($edad);
//  print_r($edades);
//  print_r($edades['platforms'][0]['name']);




foreach($edades as $rango){
    $destino= $rango['id'];
if($edad != $destino ){



 



}else if($destino == $edad){   
//    print_r("SI ENCONTRO LA PLATAFORMA");
//    echo($destino);
//    echo($edad);



$url= $rango['url'];



$html2 = "<img   id='caratula' style='width:10%;'  class='card-img-top;img-fluid'; src='img/edades/$url.png' alt='$url'>";

                        
                                    //     // Imprimir el HTML resultante
                                  echo $html2;





}else{
    

}

}











}



};

















?>