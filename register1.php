<?php
include "../matelaslux/funciones.php";
Navbar();
?>


<div class="container"> 
    <div class="card text-dark bg-light mb-3" style="max-width: 50rem;" >
        <div class="card-header">Ajouter une Commande</div>
        <div class="card-body">
                <h5 class="card-title">Numer de Commande:
                <?php    
                    $con = abrirConexion();
                    $consulta = "SELECT auto_increment from information_schema.tables where table_schema='matelaslux' and table_name='items'";
                    $datos = mysqli_query($con, $consulta);
                    $array = mysqli_fetch_array($datos, MYSQLI_NUM);
                    echo "<td><input class='form-control' type='text' name='id' value = 'ID: $array[0]' readonly></td>";
                ?>
                </h5>
            <p class="card-text">
                <form method="POST" enctype="multipart/form-data">
                        Nome Prenom:* <input class="form-control" type="text" name="name"required/><br>
                        Adress:* <input class="form-control" type="text" name="adress"required/><br>
                        Bloque: <input class="form-control" type="test" name="bloque"><br>
                        Wilaya:* <input class="form-control" type="text" name="wilaya" required/><br>
                        Code Postal:* <input class="form-control" type="text" name="codepostal"required/><br>
                        Tel:* <input class="form-control" type="text" name="tel"required/><br>
                        Fax: <input class="form-control" type="text" name="fax"><br>
                        Email: <input class="form-control" type="text" name="email"><br>
                        <button type="submit" name="additem" class="btn btn-success">Ajouter une commande</button>
                </form>
            </p>
        </div>
    </div>
</div>




<?php 
	// config database:
    $hostname = 'localhost';
	$database = 'matelaslux';
	$username = 'root';
	$password = '';
	$conexion = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8",$username,$password);
    if (isset($_POST['additem']))
    {
        $checkTel = $conexion -> prepare ("SELECT * FROM items where TEL =:TEL");
        $tel = $_POST['tel'];
        $checkTel -> bindParam("TEL",$tel);
        $checkTel -> execute();

        if ($checkTel -> rowCount() > 0 )
        {
            echo'<div class="alert alert-warning" role="alert">
            Le telephone exist deja!
            </div>';
        }else{

            $name = $_POST['name'];
            $adress = $_POST['adress'];
            $bloque = $_POST['bloque'];
            $wilaya = $_POST['wilaya'];
            $codepostal = $_POST['codepostal'];
            $tel = $_POST['tel'];
            $fax = $_POST['fax'];
            $email = $_POST['email'];

            $AddUser = $conexion -> prepare ("INSERT INTO items (NAME,ADRESS,BLOQUE,WILAYA,CODEPOSTAL,TEL,FAX,EMAIL) 
            VALUES(:NAME,:ADRESS,:BLOQUE,:WILAYA,CODEPOSTAL,TEL,FAX,EMAIL)");
            $AddUser -> bindParam ("NAME",$name);
            $AddUser -> bindParam ("ADRESS",$adress);
            $AddUser -> bindParam ("BLOQUE",$bloque);
            $AddUser -> bindParam ("WILAYA",$wilaya);
            $AddUser -> bindParam ("CODEPOSTAL",$codepostal); 
            $AddUser -> bindParam ("TEL",$tel);
            $AddUser -> bindParam ("FAX",$fax);
            $AddUser -> bindParam ("EMAIL",$email);
            $AddUser -> execute();
            // // si la base de datos esta cambiada 
            // if ($AddUser -> execute()){
            //     echo '<div class="p-3 mb-2 bg-success text-white">Votre Compte a Ete Crees Avec Succes (-_-)!</div>';
            // }
        }                      
    }   
       
?>

