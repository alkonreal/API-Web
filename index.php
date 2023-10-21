<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Juegos Jugados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="estilos.css">

<style>
#loader {
  border: 16px solid #f3f3f3;
  border-top: 16px solid #3498db;
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
  margin: auto;
  margin-top: 200px;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.hidden {
  display: none;
}



/* #loader2{


  margin: auto;
  margin-top: 300px;
display: absolute; 


} */
/* .cortar{
  width:200px;
  height:20px;
  padding:20px;
  border:1px solid blue;
  text-overflow:ellipsis;
  white-space:nowrap; 
  overflow:hidden;
  -webkit-transition: all 1s;
  -moz-transition: all 1s;
  transition: all 1s;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.cortar:hover {
  width: 100%;
  white-space: initial;
  overflow:visible;
  cursor: pointer;
} */


</style>









</head>

<body style=";">

  <?php include 'general.php'; ?>
  <div class="container mt-5">
    <h1>Formulario con URL</h1>
    <!-- <form method="POST" action="obtenerCaratula.php"> -->
    <form method="POST" action="" onsubmit="showLoader()">
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
<!-- Prueba - SI PONGO ESTO, ME SALEN LAS  TARJETAS UNA AL LADO DE LA OTRA....--> 
<!-- 
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
  </div> -->

  <div id="loader"></div>
  <!-- <h5 id="loader2"> Esta cargando.... te jodes   </h5> -->
<!--################################################################# -->

<div class='row row-cols-1 row-cols-md-4 g-2 mx-auto'>

  <?php

foreach ($response2 as $tururu){

     // Iniciar el temporizador
$start = microtime(true);


  // echo " <div class='row row-cols-1 row-cols-md-2 g-4'>";//inicio etiqueta row
 echo "<div class='col'>"; //inicio etiqueta col
  echo  "<div class='card mx-auto' style='width: 22rem;'>"; //inicio etiqueta card
  
  // Mostrar la caratula del juego ##########################################################

  // Verificar si la propiedad 'cover' existe
  if (property_exists($tururu, 'cover')) {
    obteneresacosa($tururu->cover);
    $cover = $tururu->cover;
    if (is_array($cover)) {
        // Si 'cover' es un array
        // echo "Player Perspectives: " . implode(', ', $cover);
          // Obtener las diferentes perspectivas del juego
  
    } 
  } else {
    // Si 'cover' no existe
    echo '<div><img   id="caratula" style="width:100%;"  class="card-img-top;img-fluid"; src="img/error.svg" alt="Carátula del juego"></div>';

  
  }
   

  //#############################################
  echo "<h5 class='card-title ' style='text-align:center'>".$tururu->name."</h5>";
  echo  "<div class='card-body'>";


  echo " <ul class='list-group'>";
  // echo "<pre>" . $tururu->summary . "</pre>";
  echo "<li class='list-group-item'><strong>ID: </strong>".$tururu->id."</li>";
  echo "<li class='list-group-item'><strong>Nombre: </strong>".$tururu->name."</li>";
 
 
//  SUMMARY RESUMEN #############################################################################
 
  // Verificar si la propiedad 'summary' existe
if (property_exists($tururu, 'summary')) {
  echo "<li class='list-group-item'><strong>Resumen: </strong>".$tururu->summary."</li>";
  $summary = $tururu->summary;
  if (is_array($summary)) {
      // Si 'summary' es un array
      // echo "Player Perspectives: " . implode(', ', $summary);
        // Obtener las diferentes perspectivas del juego

  } 
} else {
  // Si 'summary' no existe
  echo "<li class='list-group-item'><strong>Resumen </strong> No hay información del Resumen</strong></li>";
}
 
 
 
  


//#############################################################################

// PLATFORMS PLATAFORMAS########################################################################

// Verificar si la propiedad 'platforms' existe
if (property_exists($tururu, 'platforms')) {
  $platforms = $tururu->platforms;



  echo "<li class='list-group-item'><strong>Plataformas: </strong>";
  if (is_array($platforms)) {
      // Si 'platforms' es un array
      // echo "Player Perspectives: " . implode(', ', $platforms);
        // Obtener las diferentes perspectivas del juego
foreach($platforms as $juju2){
  // $pers=$tururu->platforms;
  // print_r("Plataformas del juego");
  // print_r($juju2);
  // print_r($pers[0]);
  global $juju2;
  // obtenerPlataforma($juju2);
 veamos($juju2);






};

echo "</li>"; // Para meter las imagenes directamente en el <li>;
  } else {
      // // Si 'platforms' no es un array
      // echo "Player Perspectives: " . $platforms;
      // obtenerPlataforma($platforms);
      veamos($juju2);
  }
} else {
  // Si 'platforms' no existe
  echo "<li class='list-group-item'><strong>Plataformas: </strong> No hay información de la plataforma</strong></li>";
}

// Para mostrar las Imagenes de las plataformas





  // echo "<li class='list-group-item'><strong>Plataformas: </strong>".$tururu->platforms."</li>";



// ##############################################################################



// age_ratings EDADES #############################################################################

// Verificar si la propiedad 'age_ratings' existe
if (property_exists($tururu, 'age_ratings')) {
  $age_ratings = $tururu->age_ratings;
  echo "<li class='list-group-item'   id='edades'><strong>Edades: </strong>";
  if (is_array($age_ratings)) {
      // Si 'age_ratings' es un array
      // obtenerEdades($age_ratings);
      // echo "EDADES ARRAY: " . implode(', ', $age_ratings);
        // Obtener las diferentes perspectivas del juego
                          foreach($age_ratings as $juju){
                            // // $pers=$tururu->age_ratings;
                            // print_r("EDADES del juego");
                            // print_r($juju);
                            // print_r($pers[0]);
                            // obtenerEdades($juju);
                            veamosedades($juju);
                          };
  } else {
      // // Si 'age_ratings' no es un array
      // echo "EDADES NO ARRAY: " . $age_ratings;
      // obtenerEdades($age_ratings);
      // veamosedades($juju);
  }
} else {
  // Si 'age_ratings' no existe
  echo "<li class='list-group-item'><strong>Edades: </strong> No hay información de las Edades</strong></li>";
}

echo "</li>"; // 
  // echo "<li class='list-group-item'><strong>Edades: </strong>".$tururu->age_ratings."</li>";


// ########################################################################



// category CATEGORIAS #############################################################################

// if (property_exists($tururu, 'category')) {
//   $category = $tururu->category;
//   if ($category == 0) {
//       echo "<li class='list-group-item'><strong>Categoria: </strong>Juego Principal</li>";
//   } else if ($category == 1) {
//       echo "<li class='list-group-item'><strong>Categoria: </strong> DLC</li>";
//   } else if ($category == 2) {
//       echo "<li class='list-group-item'><strong>Categoria: </strong> Expansión</li>";
//   } else if ($category == 3) {
//       echo "<li class='list-group-item'><strong>Categoria: </strong> Combo</li>";
//   } else if ($category == 4) {
//       echo "<li class='list-group-item'><strong>Categoria: </strong> Expansión Independiente</li>";
//   } else if ($category == 5) {
//       echo "<li class='list-group-item'><strong>Categoria: </strong> Modificación</li>";
//   } else if ($category == 6) {
//     echo "<li class='list-group-item'><strong>Categoria: </strong> Episodio</li>";
// } else if ($category == 7) {
//   echo "<li class='list-group-item'><strong>Categoria: </strong> Temporada</li>";
// } else if ($category == 8) {
//   echo "<li class='list-group-item'><strong>Categoria: </strong> Remake</li>";
// } else if ($category == 9) {
//   echo "<li class='list-group-item'><strong>Categoria: </strong> Remasterización</li>";
// } else if ($category == 10) {
//   echo "<li class='list-group-item'><strong>Categoria: </strong> Juego Expandido</li>";
// } else if ($category == 11) {
//   echo "<li class='list-group-item'><strong>Categoria: </strong> Port </li>";
// } else if ($category == 12) {
//   echo "<li class='list-group-item'><strong>Categoria: </strong> Basado en el </li>";
// } else if ($category == 13) {
//   echo "<li class='list-group-item'><strong>Categoria: </strong> Pack</li>";
// } else if ($category == 14) {
//   echo "<li class='list-group-item'><strong>Categoria: </strong> Actualización</li>";
// } 
// } else {
//   echo "<li class='list-group-item'><strong>PEGI: </strong> No hay información de la clasificación PEGI</li>";
// }




if (property_exists($tururu, 'category')) {
  $category = $tururu->category;
  // print_r($category);
  echo "<li class='list-group-item'><strong>Categorias: </strong>";
   veamoscategoria($category);
  
  
  
}else {
  // Si 'category' no existe
  echo "<li class='list-group-item'><strong>categroria: </strong> No hay información de la pespectiva</strong></li>";
}

echo "</li>"; //Cierre del LI de las perspectivas


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
  echo "<li class='list-group-item'><strong>Perspectivas: </strong>";
  if (is_array($player_perspectives)) {
      // Si 'player_perspectives' es un array
      // echo "Player Perspectives: " . implode(', ', $player_perspectives);
        // Obtener las diferentes perspectivas del juego
foreach($player_perspectives as $juju){
  // $pers=$tururu->player_perspectives;
  // print_r("Perspectivas del juego");
  // print_r($pers);
  // print_r($pers[0]);
  // obtenerPerspectiva($juju);
  veamosperspectiva($juju);
};
  } else {
      // // Si 'player_perspectives' no es un array
      // echo "Player Perspectives: " . $player_perspectives;
      // obtenerPerspectiva($player_perspectives);
      veamosperspectiva($juju);
  }
} else {
  // Si 'player_perspectives' no existe
  echo "<li class='list-group-item'><strong>Perspectiva: </strong> No hay información de la pespectiva</strong></li>";
}

echo "</li>"; //Cierre del LI de las perspectivas
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
  
$end = microtime(true);
$time = $end - $start;

// Imprimir el tiempo transcurrido
echo "Tiempo transcurrido: " . $time . " segundos EN CARGAR LA INFO DE CADA JUEGO!!";

    print_r($time);

  echo "<div class='card-body ' style='text-align:center;'>";// Apertura del div de los LINKS
  echo "<a href='$tururu->url' target='_¡blank' class='card-link'>+ INFO</a>";
 echo "<a href='#' class='card-link'>Añadir a la lista</a>";
echo "</div>";// Cierre del div de los LINKS




  echo "</div>" ;//Cierre card-body
  echo "</div>" ;//Cierre etiqueta card
  echo "</div>" ;//Cierre etiqueta col
  // echo "</div>" ;//Cierre etiqueta row

}; //cierre del Foreach GENERAL





?>


</div>

<script>
  // Este script ocultará el cargador después de que la página haya terminado de cargar.
  window.addEventListener('load', function showLoader(){
    var loader = document.getElementById('loader');
    // var loader2 = document.getElementById('loader2');
    
    loader.classList.add('hidden')
    // loader2.classList.add('hidden')
    setTimeout(function() {
      loader.classList.add('hidden');
      // loader2.classList.add('hidden');
    }, 3000); // Ajusta el tiempo según la duración de tu tarea de procesamiento.
  });
</script>


</body>

</html>