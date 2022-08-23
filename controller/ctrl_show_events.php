<?php 
    include './utils/connectBdd.php';
    include './model/model_event.php';
    include './manager/manager_event.php';
    include './vue/view_show_events.php';
    //message 
    $message = ""; 
    //instance de l'objet ManagerEvent
    $event = new ManagerEvent(null, null);
    //stocker le résultat de la méthode getAllEvent
    $liste = $event->getAllEvents($bdd);
    //test si le tableau d'event est vide
    if(empty($liste)){
        $message = '<a href="//events/addEvent">Veuillez ajouter un évenement</a>';
    }
    //test sinon (tableau est rempli)
    else{
        //parcourir le tableau (version tableau associatif)
        foreach($liste as $value){
            echo "<p>Num : ".$value[0]['id_event'].
            " Nom : ".$value[0]['nom_event'].
            " Date : ".$value[0]['date_event'].
            " Type : ".$value[0]['nom_type'].
            " Description : ".$value[0]['desc_event']." </p>";
        }
    }
    echo $message;
?>