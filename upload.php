<?php
include "../matelaslux/funciones.php";
Navbar();
?>


<?php   
// config database
$username = "dbu1478837";
$password = "5607Visa@";
$database = new PDO("mysql:host=db5006386380.hosting-data.io;dbname=dbs5317075;charset=utf8",$username,$password);
$dataview = $database -> prepare("SELECT * FROM users");
$dataview -> execute();

if (isset($_POST['upload'])){

    $fileName = $_FILES["file"]["name"];
    $fileType = $_FILES["file"]["type"];
    $fileData = file_get_contents($_FILES["file"]["tmp_name"]);
    $addfileserver = $database -> prepare("INSERT INTO users (file,filename,filetype) VALUES(:file,:filename,:filetype)");
    $addfileserver -> bindParam("file",$fileData);
    $addfileserver -> bindParam("filename",$fileName);
    $addfileserver -> bindParam("filetype",$fileType);
   
   
    if($addfileserver -> execute()){
    echo'تم حفض الملغ';


    $dataview = $database -> prepare("SELECT * FROM users WHERE  filetype='image/png' ");
    $dataview -> execute();

    $dataview = $database -> prepare("SELECT * FROM users");
        $dataview -> execute();

    foreach($dataview as $file){
     
        $getfile = "data:" . $data['filetype']. ";bsae64,".base64_encode($data['file']);
        echo"<a href='". $getfile ."'download> <br>DOWNLOAD HERE</a><br>";
        echo"<a href=$file[position] download> <img src= $file[position]  alt=spax".$file["name"]." width= 104 height= 142> <br>Click para descarga</a><br>";
        

    }
   } else{echo'لم يتم حقض الملغ';}

}

?>



