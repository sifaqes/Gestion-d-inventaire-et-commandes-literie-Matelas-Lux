<!-- Mor information SIFAQES ZERROUKI at email: zs7@gcloud.ua.es -->
<!-- HTML  TOOLS https://getbootstrap.com/docs/5.1/getting-started/introduction/ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file" accept="image/*"  required />
    <button type="submit" name="upload">Discargar Imagen</button>
</form>


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



