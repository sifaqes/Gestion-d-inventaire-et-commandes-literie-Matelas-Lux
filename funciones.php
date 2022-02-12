<?php 

	function AbrirConexion() {



    $host_name = 'localhost';
      $database = 'matelaslux';
      $user_name = 'root';
      $password = '';
      $conexion = mysqli_connect($host_name, $user_name, $password, $database);
      mysqli_set_charset($conexion, 'utf8');
		if (!$conexion) {
			echo "<strong>¡ERROR! Conexión a la BD fallida</strong>";
		}
		return $conexion;

	}




function Navbar()  {
echo'<!-- BOOTSTRAP SCRIPTS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- Contunido externo -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MATELASLUX</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../matelaslux/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../matelaslux/register.php">Ajouer une comande</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../matelaslux/upload.php">Ajouer une photo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>';

}

    ?>