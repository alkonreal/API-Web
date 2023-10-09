<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Películas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <?php include 'obtenerdatos.php'; ?>





  <div id="games-container">



  </div>



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










  <script>
    console.log("")
  </script>

  <div class="card">

    <?php foreach ($resultado as $key): ?>
    <br>
    <br>
    <br>
    <div class="card-body  ">
      <h5 class="card-title " style="text-align:center">Juego Buscado</h5>
      <br>

      <ul class="list-group">
<li> <?php  mostrarInformacionJuego($joder);  ?></li>

        <li class="list-group-item"><strong>ID:</strong> <?php echo $key["id"] ?><?php  ?> </li>

        <li class="list-group-item"><strong>Nombre:</strong> <?php echo $key["name"] ?></strong><?php  ?> </li>




        <li class="list-group-item"><strong>Resumen:</strong>

          <?php if (isset($key["summary"])) {
  if (is_array($key["summary"])) {
      echo implode(', ', $key["summary"]);
  } else {
      echo $key["summary"];
  }
} else {
  echo "No disponible";} ?>






        </li>



        <li class="list-group-item"><strong>Plataformas:</strong> <?php
if (isset($key["platforms"])) {
  if (is_array($key["platforms"])) {
      echo implode(', ', $key["platforms"]);
  } else {
      echo $key["platforms"];
  }
} else {
  echo "No disponible";
}
?></strong> <?php  ?> </li></strong><?php  ?>
        </li>


        <!-- Como donde están las edades es un Array, tengo que hacer un IMPLODE para convertir en texto un ARRAY -->

        <li class="list-group-item"><strong>Edades:</strong> <?php
if (isset($key["age_ratings"]) && is_array($key["age_ratings"])) {
    echo implode(', ', $key["age_ratings"]);
} else {
    echo "No disponible"; // o algún otro mensaje de tu elección
}
?></strong> <?php  ?> </li>

        <li class="list-group-item"><strong>Categoria:</strong> <?php echo $key["category"] ?></strong><?php  ?> </li>
        <li class="list-group-item"><strong>Lanzado:</strong> <?php echo $key["first_release_date"] ?></strong><?php  ?>
        </li>

        <!-- Si es array Perspectiva -->
        <li class="list-group-item"><strong>Perspectiva:</strong> <?php
if (isset($key["player_perspectives"]) && is_array($key["player_perspectives"])) {
    echo implode(', ', $key["player_perspectives"]);
} 
else {
    echo "No disponible"; // o algún otro mensaje de tu elección
}
?>
</strong> <?php  ?> </li>





        <li class="list-group-item"><strong>Puntuación: </strong> <?php echo $key["rating"] ?> </li>

        <li class="list-group-item"><strong>Cover ID : </strong> <?php echo $key["cover"] ?> </li>
        
        <li class="list-group-item"><strong>Caratula: </strong> <?php echo $coverURL ?> </li>
        
        <li class="list-group-item"><strong>Caratula $coverURL2: </strong> <?php echo $coverURL2 ?> </li>
        
        <li class="list-group-item"><strong>Caratula $HTML: </strong> <?php echo $html ?> </li>
       
        <li class="list-group-item"><strong>Caratula $joder: </strong> <?php echo $joder ?> </li>
        <?php foreach ($joder[0] as $key3): print_r($joder);?>
          


<li class="list-group-item"><strong>Caratula $KEY3: </strong> <?php  





echo $key3 ?> </li>


          <?php endforeach; ?>

    

      </ul>
    </div>
  </div>


  <?php endforeach; ?>

  </div>
  </div>
  </div>

  

  <?php


// echo $response;

?>














  <!-- Esta petición Funciona sin problemas -->
  <!-- <script>



function printAbilities(data) {
    // alert("Llego hasta aquí");
  const moviesList = document.getElementById("moviesList");
 
  const movieCard = document.createElement("div");
    movieCard.classList.add("col-md-4", "mb-4");
    let games = data
      let html= ""
      games.forEach(game => {
      var name = game.name;
      var id = game.id;
      var summary = game.summary;
      var Plataformas = game.platforms;
      var cover = game.cover
    movieCard.innerHTML = `
     
      <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">${game.name}</h5>
    <p class="card-text">${game.summary}</p>
  </div>
  <ul class="list-group list-group-flush" id="habilidades">
    <li class="list-group-item id="plataformas">Plataformas:${game.platforms} </li>
    <li class="list-group-item">Año salida: </li>
    <li class="list-group-item">Compañia</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>

    `;

    moviesList.appendChild(movieCard);
  });}

var myHeaders = new Headers();
myHeaders.append("Client-ID", "6qvxbbsaj6fa9qtvfughtzr3stz1th");
myHeaders.append("Authorization", "Bearer fdtxfdku5kgsc0v23033btep1ahl4w");
// añadir esto para evitar el error de "Missing required request header. Must specify one of: origin,x-requested-with"
myHeaders.append("X-Requested-With", "XMLHttpRequest");
myHeaders.append("Content-Type", "text/plain");
// myHeaders.append("Content-Type", "application/json");

var raw = "fields *; where id = 15;\r\n";

var requestOptions = {
  method: 'POST',
  headers: myHeaders,
  body: raw,
  redirect: 'follow'
};

// Petición Fetch

function getAbilities(){

//  El https://cors-anywhere.herokuapp.com/ se añade para evitar el maltdito error de CORS.....
fetch("https://cors-anywhere.herokuapp.com/https://api.igdb.com/v4/games/", requestOptions)
  // .then(response => response.text())
  // .then(result => console.log(result))
  // .catch(error => console.log('error', error));
  .then(request => request.json())
    .then((data) => {
   
       printAbilities(data);
      console.log(data)
      let games = data
      let html= ""
      

   // Agrega el HTML al elemento con el id "games-container"
  //  document.getElementById("games-container").innerHTML = html;
  })
  .catch(error => console.log('error', error));



}

  getAbilities();

    	

  





</script> -->

</body>

</html>