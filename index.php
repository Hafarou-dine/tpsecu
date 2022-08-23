<?php
    // Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    // test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';

    switch($path){
        case '/events/addUser':
            include './controller/ctrl_add_user.php';
            break;
        case '/events/login':
            include './controller/ctrl_login.php';
            break;
        case '/events/activate':
            include './controller/ctrl_activate.php';
            break;
        case '/events/addEvent':
            include './controller/ctrl_add_event.php';
            break;
        case '/events/allEvents':
            include './controller/ctrl_all_events.php';
            break;
        default :
            include './controller/ctrl_all_events.php';
            break;
    }
?>