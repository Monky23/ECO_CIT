<?php require_once 'conn.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Gestion de marques</h1>
    <nav>
        <a href="index.php">Acceuil</a>
        <a href="add.php">ajout</a>
        <a href="blog.php">blog</a>
        <a href="tuto.php">tuto</a>
    </nav>
    <h2>Affichage des articles</h2>
    <div>
        <?php
            $article = 'SELECT * FROM article ORDER BY date DESC;';
            $screenArticle = mysqli_query($conn, $article);

            while ($row = mysqli_fetch_assoc($screenArticle)) { 
                $dt_debut = date_create_from_format('Y-m-d H:i:s', $row['date']);
                $article_id = $row['id']; 
                echo "<h3>".$row['title']."</h3>"; 
                echo "<h4>Le ".$dt_debut->format('d/m/Y H:i:s')."</h4>"; 
                echo "<div style='width:400px'>".$row['content']." </div>"; 
                if ($row['file'] != "") { 
                   echo "<img src='photos/".$row['file']."' width='300px' height='300px'/>";?>
                   <form method='post'>
                    <a href="del_article.php?id=<?php echo $article_id; ?>"> Supprimer </a>
                    <a href="update_article.php?id=<?php echo $article_id; ?>"> Modifier </a>
               </form>
                <?php } 
                echo "<hr />"; 
             } 
    ?>
    </div>
</body>
</html>