<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Juegos Jugados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="estilos.css">
</head>

<body>

  <?php include 'general.php'; ?>
  <div class="container mt-5">
    <h1>Formulario con URL</h1>
    <!-- <form method="POST" action="obtenerCaratula.php"> -->
    <form method="POST" action="">
      <!-- El formulario enviará los datos a un archivo "procesar.php" -->
      <div class="form-group">
        <label for="texto">Busqueda del juego:</label>
        <input type="text" class="form-control" id="texto" name="texto">
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>


  <!-- Peticion en PHP -->








  <!-- Muestra el valor de la variable $juego -->
  <div class="container mt-3">
    <h2>Juego introducido:</h2>
    <?php echo $juego; ?>
  </div>
<!-- Prueba -->

  <div class="row row-cols-1 row-cols-md-4 g-4">
  <div class="col">
    <div class="card">
      <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co28fg.png" class="card-img-top;img-fluid" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
      <div class="card">
      <img src="https://images.igdb.com/igdb/image/upload/t_cover_big/co28fg.png" class="card-img-top;img-fluid" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  </div>


<!--################################################################# -->


  <?php

foreach ($response2 as $tururu){

 


  echo " <div class='row row-cols-1 row-cols-md-2 g-4'>";//inicio etiqueta row
 echo "<div class='col'>"; //inicio etiqueta col
  echo  "<div class='card' style='width: 24rem;'>"; //inicio etiqueta card
  echo "<h5 class='card-title ' style='text-align:center'>Juego Buscado</h5>";
  echo  "<div class='card-body'>";

  // Mostrar la caratula del juego
  obteneresacosa($tururu->cover);
  //#############################################

  echo " <ul class='list-group'>";
  // echo "<pre>" . $tururu->summary . "</pre>";
  echo "<li class='list-group-item'><strong>ID: </strong>".$tururu->id."</li>";
  echo "<li class='list-group-item'><strong>Nombre: </strong>".$tururu->name."</li>";
 
 
//  SUMMARY RESUMEN #############################################################################
 
 // Verificar si la propiedad 'summary' existe
if (property_exists($tururu, 'summary')) {
  $summary = $tururu->summary;
  if (is_array($summary)) {
      // Si 'summary' es un array
      // echo "Player Perspectives: " . implode(', ', $summary);
        // Obtener las diferentes perspectivas del juego

  } 
} else {
  // Si 'summary' no existe
  echo "<li class='list-group-item'><strong>Perspectiva: </strong> No hay información del Resumen</strong></li>";
}
 
 
 
  echo "<li class='list-group-item'><strong>Resumen: </strong>".$tururu->summary."</li>";

//#############################################################################

// PLATFORMS PLATAFORMAS########################################################################

// Verificar si la propiedad 'platforms' existe
if (property_exists($tururu, 'platforms')) {
  $platforms = $tururu->platforms;
  if (is_array($platforms)) {
      // Si 'platforms' es un array
      // echo "Player Perspectives: " . implode(', ', $platforms);
        // Obtener las diferentes perspectivas del juego
foreach($platforms as $juju){
  // $pers=$tururu->platforms;
  // print_r("Perspectivas del juego");
  // print_r($pers);
  // print_r($pers[0]);
  obtenerPlataforma($juju);
};
  } else {
      // // Si 'platforms' no es un array
      // echo "Player Perspectives: " . $platforms;
      obtenerPlataforma($platforms);
  }
} else {
  // Si 'platforms' no existe
  echo "<li class='list-group-item'><strong>Perspectiva: </strong> No hay información de la plataforma</strong></li>";
}



  // echo "<li class='list-group-item'><strong>Plataformas: </strong>".$tururu->platforms."</li>";



// ##############################################################################



// age_ratings EDADES #############################################################################

// Verificar si la propiedad 'age_ratings' existe
if (property_exists($tururu, 'age_ratings')) {
  $age_ratings = $tururu->age_ratings;
  if (is_array($age_ratings)) {
      // Si 'age_ratings' es un array
      // obtenerEdades($age_ratings);
      // echo "EDADES ARRAY: " . implode(', ', $age_ratings);
        // Obtener las diferentes perspectivas del juego
                          foreach($age_ratings as $juju){
                            // $pers=$tururu->age_ratings;
                            // print_r("Perspectivas del juego");
                            // print_r($pers);
                            // print_r($pers[0]);
                            obtenerEdades($juju);
                          };
  } else {
      // // Si 'age_ratings' no es un array
      echo "EDADES NO ARRAY: " . $age_ratings;
      obtenerEdades($age_ratings);
  }
} else {
  // Si 'age_ratings' no existe
  echo "<li class='list-group-item'><strong>Edades: </strong> No hay información de las Edades</strong></li>";
}


  // echo "<li class='list-group-item'><strong>Edades: </strong>".$tururu->age_ratings."</li>";


// ########################################################################



// category CATEGORIAS #############################################################################

if (property_exists($tururu, 'category')) {
  $category = $tururu->category;
  if ($category == 0) {
      echo "<li class='list-group-item'><strong>Categoria: </strong>Juego Principal</li>";
  } else if ($category == 1) {
      echo "<li class='list-group-item'><strong>Categoria: </strong> DLC</li>";
  } else if ($category == 2) {
      echo "<li class='list-group-item'><strong>Categoria: </strong> Expansión</li>";
  } else if ($category == 3) {
      echo "<li class='list-group-item'><strong>Categoria: </strong> Combo</li>";
  } else if ($category == 4) {
      echo "<li class='list-group-item'><strong>Categoria: </strong> Expansión Independiente</li>";
  } else if ($category == 5) {
      echo "<li class='list-group-item'><strong>Categoria: </strong> Modificación</li>";
  } else if ($category == 6) {
    echo "<li class='list-group-item'><strong>Categoria: </strong> Episodio</li>";
} else if ($category == 7) {
  echo "<li class='list-group-item'><strong>Categoria: </strong> Temporada</li>";
} else if ($category == 8) {
  echo "<li class='list-group-item'><strong>Categoria: </strong> Remake</li>";
} else if ($category == 9) {
  echo "<li class='list-group-item'><strong>Categoria: </strong> Remasterización</li>";
} else if ($category == 10) {
  echo "<li class='list-group-item'><strong>Categoria: </strong> Juego Expandido</li>";
} else if ($category == 11) {
  echo "<li class='list-group-item'><strong>Categoria: </strong> Port </li>";
} else if ($category == 12) {
  echo "<li class='list-group-item'><strong>Categoria: </strong> Basado en el </li>";
} else if ($category == 13) {
  echo "<li class='list-group-item'><strong>Categoria: </strong> Pack</li>";
} else if ($category == 14) {
  echo "<li class='list-group-item'><strong>Categoria: </strong> Actualización</li>";
} 
} else {
  echo "<li class='list-group-item'><strong>PEGI: </strong> No hay información de la clasificación PEGI</li>";
}



  // echo "<li class='list-group-item'><strong>Categoria: </strong>".$tururu->category."</li>";


  // ########################################################################################
  
  
  // first_release_date FECHA LANZAMIENTO #############################################################################
  
  if (property_exists($tururu, 'first_release_date')) {
    $first_release_date = $tururu->id;
    if (is_array($first_release_date)) {
        // Si 'first_release_date' es un array
        // obtenerEdades($first_release_date);
        // echo "EDADES ARRAY: " . implode(', ', $first_release_date);
          // Obtener las diferentes perspectivas del juego
                          
    } else {
        // // Si 'first_release_date' no es un array
        // echo "NO ARRAY: " . $first_release_date;
        obtenerFechasalida($first_release_date);
    }
  } else {
    // Si 'first_release_date' no existe
    echo "<li class='list-group-item'><strong>Lanzado: </strong> No hay información de las fechas de lanzamiento</strong></li>";
  }
  






  
  // echo "<li class='list-group-item'><strong>Lanzado: </strong>".$tururu->first_release_date."</li>";
 


// #########################################################################################
// PERSPECTIVAS

// Verificar si la propiedad 'player_perspectives' existe
if (property_exists($tururu, 'player_perspectives')) {
  $player_perspectives = $tururu->player_perspectives;
  if (is_array($player_perspectives)) {
      // Si 'player_perspectives' es un array
      // echo "Player Perspectives: " . implode(', ', $player_perspectives);
        // Obtener las diferentes perspectivas del juego
foreach($player_perspectives as $juju){
  // $pers=$tururu->player_perspectives;
  // print_r("Perspectivas del juego");
  // print_r($pers);
  // print_r($pers[0]);
  obtenerPerspectiva($juju);
};
  } else {
      // // Si 'player_perspectives' no es un array
      // echo "Player Perspectives: " . $player_perspectives;
      obtenerPerspectiva($player_perspectives);
  }
} else {
  // Si 'player_perspectives' no existe
  echo "<li class='list-group-item'><strong>Perspectiva: </strong> No hay información de la pespectiva</strong></li>";
}

// ###################################################################################################


  // Obtener las diferentes perspectivas del juego
// $omg=$tururu->player_perspectives;

// foreach($omg as $juju){
//   // $pers=$tururu->player_perspectives;
//   // print_r("Perspectivas del juego");
//   // print_r($pers);
//   // print_r($pers[0]);
//   obtenerPerspectiva($juju);

// };
// #################################################################################



  echo "</ul>";

  echo "</div>" ;//Cierre card-body
  echo "</div>" ;//Cierre etiqueta card
  echo "</div>" ;//Cierre etiqueta col
  echo "</div>" ;//Cierre etiqueta row
}; //cierre del Foreach GENERAL



// Otra manera que hice

// foreach($resultado as $toma){

// echo  "<div class='card-body'>";

// echo "<h5 class='card-title ' style='text-align:center'>Juego Buscado NUEVO</h5>";

// echo " <ul class='list-group'>";
// obteneresacosa($toma["cover"]);
// echo "<li class='list-group-item'><strong>ID: </strong>".$toma['id']."</li>";
// echo "<li class='list-group-item'><strong>Nombre: </strong>".$toma['name']."</li>";
// echo "<li class='list-group-item'><strong>Resumen: </strong>".$toma['summary']."</li>";
// echo "<li class='list-group-item'><strong>Plataformas: </strong>".$toma['platforms']."</li>";
// echo "<li class='list-group-item'><strong>Edades: </strong>".$toma['age_ratings']."</li>";
// echo "<li class='list-group-item'><strong>Categoria: </strong>".$toma['category']."</li>";
// echo "<li class='list-group-item'><strong>Lanzado: </strong>".$toma['first_release_date']."</li>";

// // foreach($resultado as $vamos){

// // $pers=$vamos['player_perspectives'];
// $pers=$toma['player_perspectives'];
// // print_r("Perspectivas del juego");
// // print_r($pers);
// // print_r($pers[0]);
// obtenerPerspectiva($pers[0]);
// print_r("FUNCIONA???");

// // };
// // obtenerPerspectiva($pers);
// echo "<li class='list-group-item'><strong>Puntuación: </strong>".$toma['rating']."</li>";

 





// echo "</ul>";



// // echo "<div class="card-body  ">
// // <h5 class="card-title " style="text-align:center">Juego Buscado</h5>

// echo "</div>" ;//Cierre card-body





// };






// echo $response;

?>









</body>

</html>