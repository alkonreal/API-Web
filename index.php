<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Películas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <?php include 'general.php'; ?>

  <?php




foreach($resultado as $toma){

echo  "<div class='card-body'>";

echo "<h5 class='card-title ' style='text-align:center'>Juego Buscado NUEVO</h5>";

echo " <ul class='list-group'>";
obteneresacosa($toma["cover"]);
echo "<li class='list-group-item'><strong>ID: </strong>".$toma['id']."</li>";
echo "<li class='list-group-item'><strong>Nombre: </strong>".$toma['name']."</li>";
echo "<li class='list-group-item'><strong>Resumen: </strong>".$toma['summary']."</li>";
echo "<li class='list-group-item'><strong>Plataformas: </strong>".$toma['platforms']."</li>";
echo "<li class='list-group-item'><strong>Edades: </strong>".$toma['age_ratings']."</li>";
echo "<li class='list-group-item'><strong>Categoria: </strong>".$toma['category']."</li>";
echo "<li class='list-group-item'><strong>Lanzado: </strong>".$toma['first_release_date']."</li>";

// foreach($resultado as $vamos){

// $pers=$vamos['player_perspectives'];
$pers=$toma['player_perspectives'];
// print_r("Perspectivas del juego");
// print_r($pers);
// print_r($pers[0]);
obtenerPerspectiva($pers[0]);
print_r("FUNCIONA???");

// };
// obtenerPerspectiva($pers);
echo "<li class='list-group-item'><strong>Puntuación: </strong>".$toma['rating']."</li>";

 





echo "</ul>";



// echo "<div class="card-body  ">
// <h5 class="card-title " style="text-align:center">Juego Buscado</h5>

echo "</div>" ;//Cierre card-body





};






// echo $response;

?>









</body>

</html>