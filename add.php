<?php require_once 'conn.php';?>
<?php require_once 'insert.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Ajout d'articles</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/55e89bf74d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head> 
<body> 
   <h2>Nouvel article</h2>
   <form action="insert.php" method="POST" enctype="multipart/form-data"> 
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
      <input type="submit" name="insert" value="Envoyer"> 
   </form> 
   <br /> 
   <a href="blog.php" >VOIRE LES PUBLICATIONS</a>
</body> 
</html>