<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Matelaslux : Bonjour&nbsp;<?php echo htmlentities($_SESSION['username']); ?></title>
        <!-- Icon de main:apple windows android -->
        <link rel="icon" href="imgs\icon.png">
        <link rel="shortcut" href="imgs\icon.png">
        <link rel="apple-touche-icon" href="imgs\icon.png">

        <!-- SEO TAG FACEBOOK -->
        <meta property="og:title" content="Gestion Matelaslux">
        <meta property="og:description" content="<?php echo $Adresse; ?>">
        <meta property="og:image" content="imgs\icon.png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="720">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://crm.elbossinmobiliaria.com">
        <meta property="fb:app_id" content="xxxxxxxxxxxxxxxxxxxx">

        <!-- BOOTSTRAP and JS -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
<!-- ---------------------------------STAR PROGRAM--------------------------------- -->
<?php require_once'includes/header.php'; ?>
<?php require_once'includes/psl-config.php'; ?>
<h4 class="mb-3 container">Profile Page</h4>







<?php 
echo'<div class="container">';
$admin  = htmlentities($_SESSION['username']);
if ($admin === $Admin3 or $admin === $Admin4 or $admin === $Admin5) {
  
  $infoday = $database->prepare("SELECT * FROM commandes WHERE fecha >= CURRENT_DATE -  INTERVAL 1 DAY");
  // $infoday1 = $database->prepare("SELECT * FROM commandes WHERE prix >= CURRENT_DATE -  INTERVAL 30 DAY");
  $infoday->execute();
  // $infoday1->execute();
  $listday = $infoday->rowCount();
  // $listday1 = $infoday1->rowCount();
  // echo   $listday1;
  $info7day = $database->prepare("SELECT * FROM commandes WHERE fecha >= CURRENT_DATE -  INTERVAL 7 DAY");
  $info7day->execute();
  $list7day = $info7day->rowCount();
 
  $infoMonth = $database->prepare("SELECT * FROM commandes WHERE fecha >= CURRENT_DATE -  INTERVAL 1 MONTH");
  $infoMonth->execute();
  $listmonth = $infoMonth->rowCount();
  
  $info3Month = $database->prepare("SELECT * FROM commandes WHERE fecha >= CURRENT_DATE -  INTERVAL 3 MONTH");
  $info3Month->execute();
  $list3month = $info3Month->rowCount();

  $info1year = $database->prepare("SELECT * FROM commandes WHERE fecha >= CURRENT_DATE -  INTERVAL 3 MONTH");
  $info1year->execute();
  $list1year = $info1year->rowCount();
 
  $infoall = $database->prepare("SELECT * FROM commandes WHERE fecha = fecha");
  $infoall->execute();
  $listall = $infoall->rowCount();

  echo '<p class="bg-warning text-center border container">Tous les commandes&nbsp;'.$listall.'</p>';
echo'
<div class="container ">
    <div class="row g-3">
        <div class="col-sm-3">
              <div class="card border-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">Ahujoudhuit</div>
                <div class="card-body">
                  <h5 class="card-title">'.$listday.'&nbsp;Commandes</h5>
                  
                </div>
              </div>
        </div>
        <div class="col-sm-3">
              <div class="card border-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">7 Jours</div>
                <div class="card-body">
                  <h5 class="card-title">'.$list7day.'&nbsp;Commandes</h5>
                  
                </div>
              </div>
        </div>
        <div class="col-sm-3">
              <div class="card border-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">3 Mois</div>
                <div class="card-body">
                  <h5 class="card-title">'.$list3month.'&nbsp;Commandes</h5>
                
                </div>
              </div>
        </div>
        <div class="col-sm-3">
              <div class="card border-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">Une année</div>
                <div class="card-body">
                  <h5 class="card-title">'.$list3month.'&nbsp;Commandes</h5>
            
                </div>
              </div>
        </div>
    </div>
</div>
';

}else {
 echo '<p class="bg-light border">Autorisations dadministrateur&nbsp;:&nbsp;'.$admin.'</p>';
}
echo'</div>';
?>
















<?php 
$access  = htmlentities($_SESSION['username']);

if ($access === $Admin1 or $access === $Admin2 or $access === $Admin3 or $access === $Admin4 or  $access === $Admin5 ) {
  # code...

// ------------------------------------Delete clients--------------------------------
if(isset($_GET['remove'])){
        $id = $_GET['remove'];
        $RemoveCommande = $database->prepare("DELETE FROM commandes WHERE id = :id");
        $RemoveCommande->bindParam('id',$id);
        if ($RemoveCommande->execute()) {
               echo'<div class="alert alert-success container" role="alert">
               La commande referance '.$id.' a ete supprimer!
               </div>';
               header("location:protected_page.php",true);
                // header("Refresh:2");
                // exit;

        }else {
                echo'<div class="alert alert-danger container" role="alert">
                Il a un erreur !
                </div>';
                // header("Refresh:1");
        }
}
?>


<?php 
// ////////////////////////////////////////Afficher commande php/////////////////////////////////////////////
// $userID = openssl_encrypt($userid,'AES-256-CBC',$key,0,$iv);
$AfficherCommandes = $database->prepare("SELECT * FROM commandes WHERE id = id");
// $AfficherCommandes -> bindParam("userID",$userID);

if($AfficherCommandes->execute()){
echo'
<table class="table container">
  <thead>      
    <tr>
      <th scope="col">Ref</th>
      <th scope="col">Nom Prenom</th>
      <th scope="col">Telephon</th>
      <th scope="col">Prix</th>
      <th scope="col">La date</th>
      <th scope="col">Commande</th>
      <th scope="col">Paramettre</th>
    </tr>
  </thead> <tbody>
';
 foreach($AfficherCommandes AS $data){ 
echo'  

<form method="GET">
    <tr>
      <th scope="row">
      '.openssl_decrypt($data['user'],$crypting,$key,0,$iv).'&nbsp;'.$data['id'].'</th>
      <td>'.openssl_decrypt($data['nom'],$crypting,$key,0,$iv).'</td>
      <td>'.openssl_decrypt($data['indi'],$crypting,$key,0,$iv).openssl_decrypt($data['tel'],$crypting,$key,0,$iv).'</td>
      <td>'.openssl_decrypt($data['prix'],$crypting,$key,0,$iv).'&nbsp;'.$SymbolDinar.'</td>
      <td>'.$data['fecha'].'</td>
      <td>'.openssl_decrypt($data['tipo'],$crypting,$key,0,$iv).'&nbsp;'.openssl_decrypt($data['dim'],$crypting,$key,0,$iv).'&nbsp;x&nbsp;'.openssl_decrypt($data['hut'],$crypting,$key,0,$iv).'&nbsp;cm&nbsp;'.openssl_decrypt($data['den'],$crypting,$key,0,$iv).'</td>
      <td>
          
      <button name="remove" class="btn btn-outline-danger" type="submit" value="'.$data['id'].'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg></button>

      <a class="btn btn-outline-primary" type="button" href="view_commandes.php?view='.$data['id'].'" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16"><path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/><path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/></svg></a>
      
      <a  class="btn btn-outline-secondary" type="button" href="edit_commandes.php?edit='.$data['id'].'" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16"><path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/></svg></a>
      
      <a name="whatsapp" class="btn btn-outline-success" type="button" href="https://wa.me/'.openssl_decrypt($data['indi'],$crypting,$key,0,$iv).openssl_decrypt($data['tel'],$crypting,$key,0,$iv).'" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16"><path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg></a>
      
      <a name="viber" class="btn btn-outline-info" type="button" href="https://msng.link/o/?'.openssl_decrypt($data['indi'],$crypting,$key,0,$iv).openssl_decrypt($data['tel'],$crypting,$key,0,$iv).'=vi" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-messenger" viewBox="0 0 16 16"><path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76zm5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z"/></svg></a>
      
      </td>           
    </tr>
</form>

';



        }
echo'
</tbody>
</table>
        ';
} 
}else {
  echo'<div class="container alert-danger">Vous navez pas la permission dentrer</div>';
}
?>

<?php require_once'includes/footer.php'; ?>
<!-- ---------------------------------END PROGRAM--------------------------------- -->
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>

   

    </body>
</html>
