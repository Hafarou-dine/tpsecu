<?php
    // ouverture de la session
    session_start();
    // fermeture de la session
    session_destroy();
    // on verifie si le cookie de session existe 
    if(isset($_COOKIE['PHPSESSID'])){
        // suppression du cookie
        unset($_COOKIE['PHPSESSID']);
    }
    // on redirige vers la page par defaut
    header('Location:/events/');
?>