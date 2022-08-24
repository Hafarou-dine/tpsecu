<?php

    include './utils/connectBdd.php';
    include './model/model_event.php';
    include './manager/manager_event.php';
    include './view/view_all_events.php';
    //message 
    $message = ""; 
    //instance de l'objet ManagerEvent
    $event = new ManagerEvent(null, null, null);
    //stocker le résultat de la méthode getAllEvent
    $liste = $event->getAllEvents($bdd);
    //test si le tableau d'event est vide
    if(empty($liste)){
        $message = '<a href="/events/addEvent">Veuillez ajouter un évenement</a>';
    }
    //test sinon (tableau est rempli)
    else{
        //parcourir le tableau (version tableau associatif)
        foreach($liste as $value){
            echo '<p>
                <div>Num : '.$value->id_event.'</div>
                <div>Nom : '.$value->nom_event.'</div>
                <div>Date : '.$value->date_event.'</div>
                <div>Type : '.$value->nom_type.'</div>
                <div>Description : '.$value->desc_event.'</div>
            </p>';
        }
    }
    echo '
    <script>
        ecrireMsg("'.$message.'");
    </script>';
?>