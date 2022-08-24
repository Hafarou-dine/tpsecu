<?php

    include './utils/connectBdd.php';
    include './utils/functions.php';
    include './model/model_event.php';
    include './model/model_type.php';
    include './manager/manager_event.php';
    include './manager/manager_type.php';
    include './view/view_add_event.php';

    if(isset($_SESSION['role']) && $_SESSION['role'] ==2){
//message 
$message = "";
/**
 * création des options types
 */
// on creer une nouvelle instance de type
$all = new ManagerType();
// on recupere la liste des types en BDD
$data = $all->getAllType($bdd);
// var_dump($data);
foreach($data as $value){
    echo '
    <script>
        addOption("'.$value->nom_type.'", "'.$value->id_type.'");
    </script>';
}

//test si le bouton submit est cliqué
if(isset($_POST['create'])){
        //test si les champs sont remplis
        if($_POST['nom_event'] !="" AND $_POST['desc_event'] !="" AND $_POST['date_event'] !="" AND $_POST['type'] !="default"){
            //sécurisation des variables POST
            $nom = cleanInput($_POST['nom_event']);
            $desc = cleanInput($_POST['desc_event']);
            $date = cleanInput($_POST['date_event']);
            $type = intval($_POST['type']);
            //instancier l'objet
            $event = new ManagerEvent($nom, $desc, $date);
            $event->setIdType($type);
            // var_dump($event);
            $event->addEvent($bdd);
            $message = mb_strtoupper($event->getNomEvent())." a été ajouté";
    }
    //test sinon les champs sont vides
    else{
        $message = 'Les champs sont vides';
    }
}
//test sinon le bouton n'est pas cliqué
else{
    $message = 'Pour ajouter un article cliquez sur ajouter';
}
//affichage du message d'erreur
echo '
<script>
    ecrireMsg("'.$message.'");
</script>';
    }
    else{
        header('Location:/events/allEvents');
    }
    
?>