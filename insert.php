<?php require_once 'conn.php';?>
<?php require_once 'add.php';?>
<?php
    //Variables and request to add an article
    if((!empty($_POST['insert'])) && (empty($error))){
      $titre = mysqli_real_escape_string($conn,$_POST['titre']);
      $contenu = mysqli_real_escape_string($conn,$_POST['contenu']);
      echo($titre);

      $category = htmlspecialchars($_POST['category_name']);
      $req_category = "SELECT * FROM category WHERE name = '$category'";
      $res_category = mysqli_query($conn, $req_category);
      $row_category = mysqli_fetch_array($res_category);
      $id_category = intval($row_category[0]);

      // tests d'erreurs
      if ($_FILES['file']['error']) {  
         switch ($_FILES['file']['error']){  
               case 1: // UPLOAD_ERR_INI_SIZE  
                  echo "La taille du fichier est plus grande que la limite autorisée par le serveur (paramètre upload_max_filesize du fichier php.ini).";  
                  break;  
               case 2: // UPLOAD_ERR_FORM_SIZE  
                  echo "La taille du fichier est plus grande que la limite autorisée par le formulaire (paramètre post_max_size du fichier php.ini)."; 
                  break;  
               case 3: // UPLOAD_ERR_PARTIAL  
                  echo "L'envoi du fichier a été interrompu pendant le transfert.";         
                  break;  
               case 4: // UPLOAD_ERR_NO_FILE  
                 echo "La taille du fichier que vous avez envoyé est nulle."; 
                  break;  
            }  
      }  
      else {  
      //s'il n'y a pas d'erreur alors $_FILES['nom_du_fichier']['error'] vaut 0 
         echo " Aucune erreur dans le transfert du fichier.<br />"; 
         if ((isset($_FILES['file']['name'])&&($_FILES['file']['error'] == UPLOAD_ERR_OK))) { 
            $chemin_destination = 'photos/'; 
            //déplacement du fichier du répertoire temporaire (stocké 
            //par défaut) dans le répertoire de destination 
            move_uploaded_file($_FILES['file']['tmp_name'], $chemin_destination.$_FILES['file']['name']); 
            echo "Le fichier ".$_FILES['file']['name']." a été copié dans le répertoire photos"; 
         } 
         else { 
            echo "Le fichier n'a pas pu être copié dans le répertoire photos."; 
         } 
      }
      $file = $_FILES['file']['name'];

      $inn = "INSERT INTO article (title, content, file, date, category_id)
       VALUES ('$titre', '$contenu', '$file', '".date("Y-m-d H:i:s")."', $id_category)";
       $result = mysqli_query($conn,$inn) or die (mysqli_error($conn));
       if($result === false){
        echo "ne marche pas!!!!!";
       }
   } 
?>