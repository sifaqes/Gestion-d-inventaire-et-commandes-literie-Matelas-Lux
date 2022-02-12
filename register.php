<?php
include "../matelaslux/funciones.php";
Navbar();
?>


<!-- TABLA DE REGISTRACION -->


<div class="card text-dark bg-light mb-3" style="max-width: 18rem;">
  <div class="card-header">Ajouter une Commande</div>
  <div class="card-body">
    <h5 class="card-title">ID:    
<?php    
$con = abrirConexion();
$consulta = "SELECT auto_increment from information_schema.tables where table_schema='matelaslux' and table_name='users'";
$datos = mysqli_query($con, $consulta);
$array = mysqli_fetch_array($datos, MYSQLI_NUM);
echo "<td><input class='form-control' type='text' name='id' value = 'ID: $array[0]' readonly></td>";
?>
    </h5>
    <p class="card-text">
        
    <form method="POST" enctype="multipart/form-data">
    Name: <input class="form-control" type="text" name="name"required/><br>
    L'age: <input class="form-control" type="date" name="age"required/><br>
    Email: <input class="form-control" type="text" name="email" required/><br>
    Password: <input class="form-control" type="text" name="password"required/><br>
    <button type="submit" name="rigister" class="btn btn-success">Register new ordre</button>

  
  </form>


    </p>
  </div>
</div>


<!-- REGISTER UN NUEVO USARIO PHP -->
<?php 
	// config database:
  $hostname = 'localhost';
	$database = 'matelaslux';
	$username = 'root';
	$password = '';
	$conexion = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8",$username,$password);


    if (isset($_POST['rigister'])){

        $checkEmail = $conexion -> prepare ("SELECT * FROM users where EMAIL =:EMAIL");
        $email = $_POST['email'];
        $checkEmail -> bindParam("EMAIL",$email);
        $checkEmail -> execute();

        if ($checkEmail -> rowCount() > 0 ){
            echo'<div class="alert alert-warning" role="alert">
            Email exist deja!
            </div>';
        }else{

            $name = $_POST['name'];
            $age = $_POST['age'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $AddUser = $conexion -> prepare ("INSERT INTO users(NAME,AGE,EMAIL,PASSWORD) 
            VALUES(:NAME,:AGE,:EMAIL,:PASSWORD)");
            $AddUser -> bindParam ("NAME",$name);
            $AddUser -> bindParam ("AGE",$age);
            $AddUser -> bindParam ("EMAIL",$email);
            $AddUser -> bindParam ("PASSWORD",$password); 
       
            // si la base de datos esta cambiada 
           if ($AddUser-> execute()){
           echo '<div class="p-3 mb-2 bg-success text-white">Votre Compte a Ete Crees Avec Succes (-_-)!</div>';
                               }
                              }
                            }         
?>

