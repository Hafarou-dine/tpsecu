<?php
    /*--------------------------- IMPORTS ---------------------------*/
    include './utils/connectBdd.php';
    include './utils/functions.php';
    include './model/model_utilisateur.php';
    include './manager/manager_utilisateur.php';
    include './view/view_activate_user.html';

    /*--------------------------- LOGIQUE ---------------------------*/
    if(isset($_GET['id']) && $_GET['id'] != ""){
        // on récupère et on nettoie le token
        $token = cleanInput($_GET['id']);
        // on instancie un nouvel utilisateur
        $user = new ManagerUtilisateur();
        // on set le token à l'objet
        $user->setTokenUtil($token);
        // on recupere le compte correspondant au token 
        $compte = $user->getUserByToken($bdd);
        // on verifie si la methode getUserByToken a retourner un compte
        if($compte != null){
            // on active le compte
            $user->activateUser($bdd);  
            $msg = "Votre compte est activé"; 
        }
        else{
            $msg = "Impossible d'activer le compte";
        }
        // on redirige vers la page de connexion apès 5s
        redirect("/events/login", 5000);
    }
    else{
        // on redirige immediatement vesr la page par defaut du site
        redirect("/events/", 0);
    }
    echo '
    <script>
        ecrireMsg("'.$msg.'");
    </script>';
?>