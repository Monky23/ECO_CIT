<?php require_once 'conn.php';
    $id = $_GET['id'];
    $req_article = "SELECT * 
    FROM article as a,
    category as c
    WHERE
    a.id = '$id'
    AND
    a.category_id = c.id ORDER BY a.id DESC;";
    $screenArticle = mysqli_query($conn, $req_article);
    $row = mysqli_fetch_row($screenArticle);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modification de l'article</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<h1>Modifier l'article</h1>
   <form action="update_article.php" method="POST" enctype="multipart/form-data"> 
      <p>Titre de l'article: <input type="text" name="titre" /></p>
      </select><br>
            <label for="category">Category</label><br>
            <select name="category_name" id="category_name">
            <?php
                $categories = 'select * from category ORDER BY id DESC;';
                $screenCategories = mysqli_query($conn, $categories);
                while ($row = mysqli_fetch_array($screenCategories)) {
                        echo "<option>".$row[1]."</option>";
                }
            ?>
      </select><br>
      <p>Contenu: <br /><textarea name="contenu"></textarea></p> 
      <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
      <p>Choisissez une photo avec une taille inférieure à 2 Mo.</p> 
      <input type="file" name="file"> 
      <br /><br /> 
      <input type="submit" name="update_article" value="Envoyer">
   <!--Variables and request to update an article-->
    <?php
    if((!empty($_POST['update_article'])) && (empty($error))){

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
      $titre = mysqli_real_escape_string($conn,$_POST['titre']);
      $contenu = mysqli_real_escape_string($conn,$_POST['contenu']);
      echo($titre);

      $category = htmlspecialchars($_POST['category_name']);
      $req_category = "SELECT * FROM category WHERE name = '$category'";
      $res_category = mysqli_query($conn, $req_category);
      $row_category = mysqli_fetch_array($res_category);
      $id_category = intval($row_category[0]);

        $idarticle= intval($_GET["id"]);

        $articlemodif = "UPDATE article
        SET title = '$titre', content = '$contenu', date = '".date("Y-m-d H:i:s")."', file = '$file', category_id = '$id_category'
        WHERE id = '$idarticle'";
        $result = mysqli_query($conn, $articlemodif) or die (mysqli_error($conn));
        //header("location: blog.php");
        if($articlemodif == false){
            echo "ne marche pas!!!!!";
       }
    }
    ?>
      </form> 
    </body>
</html>    