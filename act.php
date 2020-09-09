<?php require_once 'conn.php'?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Accueil du site de l'association Eco Cit' de Chateldon</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Association à but non lucratif pour une prise de conscience écologique, qui oeuvre au travers d'évennements écolos et solidaires ainsi qu'avec des ateliers eco-responsables à Châteldon au coeur de l'Auvergne Rhônes Alpes dans le Puy De Dômes" />
    <script src="https://kit.fontawesome.com/55e89bf74d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <div class="container-fluid">
        <!--barre de nav-->
        <header class="row bg-green">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="index.php"><img src="img/logo.resized.jpg"
                            alt="logo de l'association Châteldon eco-cit' cliquable pour un retour à l'accueil" title="retour à l'accueil"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="asso.php" title="A propos de l'association">L'association</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="event.php" title="Les événements de l'association">Les événements</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="tuto.php" title="Les ateliers pratiques">Nos ateliers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="act.php" title="Les gestes écologiques">Les écos-gestes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php" title="formulaire de contacts">Nous contacter</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--bannière-->
        <section class="row bg-green" id="bandeau">
            <div class="col-md-12 col-sm-12  col-lg-12 text-center" id="titre">
                <h1>Chateldon Eco-Cit'</h1>
            </div>
        </section>
        <img src="img/banniere.png" alt="bannière du site web d'Eco Cit'" width="100%">

        <!--Dernier article de la catégorie tutos-->
        <section class="row" id="tutos">
        <?php
            $article = 'SELECT * FROM article WHERE category_id=5 ORDER BY date DESC;';
            $screenArticle = mysqli_query($conn, $article);

            while ($row = mysqli_fetch_assoc($screenArticle)) { 
                $dt_publi = date_create_from_format('Y-m-d H:i:s', $row['date']); ?>
                <div class="col-md-12 col-sm-12  col-lg-12 text-center">
                <h2><?php echo $row['title'];?></h2>
                <h5>Le <?php echo $dt_publi->format('d/m/Y H:i:s');?></h5>
            </div>
            <div id="services" class="col-md-6 txt">
                <?php echo $row['content'];?>
            </div>
            <div class="col-md-6">
            <?php if ($row['file'] != "") { 
                echo "<img src='photos/".$row['file']."' width='100%'/>"; 
                } ?>
                </div><?php
             } ?>
        </section>
        <footer class="row bg-green">
            <div class="col-md-4 foot">
                <div><i class="fas fa-map-marker-alt"></i>
                    Association Eco-Cit'<br>
                    Mairie de Chateldon, rue des 7 Carreaux<br>
                    63290 Châteldon
                </div>
                <div><i class="fas fa-mobile-alt"></i>
                    +33 6 20 81 53 21
                </div>
                <div><i class="fas fa-envelope"></i>
                    <a href="mailto:chateldon.eco-cit@lilo.org "
                        title="envoyez moi un mail en cliquant sur ce lien">chateldon.eco-cit@lilo.org</a>
                </div>
            </div>
            <div class="col-md-4 foot">
                <img src="img/logo.jpg" alt="logo de l'association" id="logofoot">
            </div>
            <div class="col-md-4 foot">
                <a href="https://www.facebook.com/Chateldon-EcoCit-101730654565150/" target="_blank"
                    title="lien vers le profil facebook eco_cit"><i class="fab fa-facebook-square fa-3x"></i>
                </a>
                <a href="https://www.instagram.com" target="_blank"
                    title="lien vers le profil instagram"><i class="fab fa-instagram fa-3x"></i></a>
                <a href="https://twitter.com" target="_blank" title="lien vers le profil twitter"><i
                        class="fab fa-twitter fa-3x"></i></a><br>
                <a href="legalmention.php" title="lien vers les mentions légales">mentions légales</a><br>
                <a href="sitemap.php" title="lien vers le plan du site web">plan du site</a><br>
            </div>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>