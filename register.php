<!-- BOOTSTRAP SCRIPTS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- TABLA DE REGISTRACION -->
<div class="container">
    <from method="POST">
        Name: <input class="form-control" type="text" name="name"required/><br>
        L'age: <input class="form-control" type="date" name="age"required/><br>
        Email: <input class="form-control" type="text" name="email" required/><br>
        Password: <input class="form-control" type="text" name="password"required/><br>
        <button class="btn btn-success " type="submit" name="signup" >Sign UP</button>
    </from>
</div>







<!-- REGISTER UN NUEVO USARIO PHP -->
<?php 
	// config database:
    $host_name = 'localhost';
	$database = 'matelaslux';
	$user_name = 'root';
	$password = '';
	$conexion = new PDO("mysql:host=$host_name;dbname=$database;charset=utf8",$user_name,$password);
    

  
    if (isset($_POST['signup'])){
        echo'SEE';
    
    }
    
        // $checkemail = $conexion -> prepare ("SELECT * FROM users where EMAIL = :EMAIL");
        // $email = $_POST['email'];
        // $checkemail -> bindParm("EMAIL",$email);
        // $checkemail -> execute();

        // if ($checkemail -> rowCount() > 0 ){
        //     echo'<div class="alert alert-warning" role="alert">
        //     Email exist deja!
        //     </div>';
        // }else{

        //     $name = $_POST['name'];
        //     $age = $_POST['age'];
        //     $email = $_POST['email'];
        //     $password = $_POST['password'];
        //     echo'<div class="alert alert-success" role="alert">
        //     Compte Cree Avec Succes!
        //     </div>';

        //     $AddUser = $conexion -> prepare ("INSERT INTO users(NAME,AGE,EMAIL,PASSWORD) 
        //     VALUES(:NAME,:AGE,:EMAIL,:PASSWORD)");
        //     $AddUser -> bindParm ("NAME",$name);
        //     $AddUser -> bindParm ("AGE",$age);
        //     $AddUser -> bindParm ("EMAIL",$email);
        //     $AddUser -> bindParm ("PASSWORD",$password);}
        //     // si la base de datos esta cambiada 
        // if ($AddUser-> execute()){
        //     echo '<div class="p-3 mb-2 bg-success text-white">Votre Compte a Ete Crees Avec Succes (-_-)!</div>';
        // }}  
        
          
        
?>



<?php 
//   // Mensaje de column y lines 
    //     if($conexion){
    //         $num_item = $conexion -> prepare("SELECT * FROM `users` WHERE 1 ");
    //         $num_item -> execute();
    //         //var_dump($num_item -> errorInfo());
    //         echo '<div class="alert alert-light" role="alert"> 
    //         Matelalux Inventaire, Columns: ',$num_item ->columnCount(), ' line: ',$num_item ->rowCount(),'
    //         </div>';
    //     }else{
    //         echo 'Il a pas de connection avec la base de donne';
    //         }
    ?>