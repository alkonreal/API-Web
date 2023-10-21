<?php  
require_once('general.php');





function veamoscategoria($pers){


$jsonFilePath = 'categorias.json';

// Verificar si el archivo existe
if (file_exists($jsonFilePath)) {
    // Cargar el contenido del JSON en un string
    $jsonString = file_get_contents($jsonFilePath);

    // Decodificar el JSON en un array asociativo
    $perspect = json_decode($jsonString,true);
//       print_r("TODO LO QUE HAY DENTRO DE pers");
//  print_r($pers);
//  print_r($perspect);
//  print_r($perspect['platforms'][0]['name']);




foreach($perspect as $vista){
 
    $destino= $vista['id'];
if($destino == $pers){   
//    print_r("SI ENCONTRO LA PLATAFORMA");
//    echo($destino);
//    echo($pers);


$name= $vista['nombre'];
$url= $vista['url'];



$html2 = "<h5>$name</h5>";
                        
                                    //     // Imprimir el HTML resultante
                                  echo $html2;





}else{



   

}

}











}



};

















?>