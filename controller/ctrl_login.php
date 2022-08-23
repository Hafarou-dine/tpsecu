<?php
    /*--------------------------- IMPORTS ---------------------------*/
    include './utils/connectBdd.php';
    include './utils/functions.php';
    // include './utils/smtp_datas.php';
    include './model/model_utilisateur.php';
    include './manager/manager_utilisateur.php';
    include './view/view_login.html';
    
    
    /*--------------------------- LOGIQUE ---------------------------*/
    $msg = "";
    // 
    if(isset($_POST['connect'])){
        if($_POST['mail_util'] != "" && $_POST['pwd_util'] != ""){
            // on stock en s'assurant d'avoir nettoyer le contenu des inputs dans des variables
            $mail = cleanInput($_POST['mail_util']);
            $mdp = cleanInput($_POST['pwd_util']);
            // 
            $user = new ManagerUtilisateur();
            // 
            $user->setMailUtil($mail);
            // 
            $compte = $user->getUserByEmail($bdd);
            // 
            if($compte != null){
                // 
                if(password_verify($mdp, $compte->pwd_util)){
                    // 
                    $_SESSION['id'] = $compte->id_util;
                    $_SESSION['nom'] = $compte->name_util;
                    $_SESSION['prenom'] = $compte->first_name_util;
                    $_SESSION['mail'] = $compte->mail_util;
                    $_SESSION['role'] = $compte->pwd_util;
                    $_SESSION['valide'] = $compte->valide_util;
                    $_SESSION['connected'] = true;
                    $msg = "Connecté";
                    // redirection vers la page liste des evenements
                    redirect("/events/", 2000);
                }
            }
            else{
                $msg = "Informations incorrectes";
            }   
        }
        else{
            $msg = "Les champs sont vide";
        }
    }
    else{
        $msg = "Cliquer sur le bouton pour vous connecter";
    }
    echo '
    <script>
        ecrireMsg("'.$msg.'");
    </script>';
?>