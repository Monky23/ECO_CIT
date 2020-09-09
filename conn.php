<?php
    $conn = mysqli_connect('127.0.0.1', 'root', ''); //connexion à la BDD
    if(!$conn){
        echo 'Big problem';
    }
    mysqli_select_db($conn,'eco_cit'); //selectionner la database
    mysqli_set_charset($conn,'utf8'); //spécifier l'encodage
?>