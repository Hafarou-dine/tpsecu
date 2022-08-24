<?php
    /*--------------------------- IMPORTS ---------------------------*/
    include './utils/connectBdd.php';
    include './utils/functions.php';
    include './model/model_utilisateur.php';
    include './manager/manager_utilisateur.php';
    include './view/view_login.html';
    
    
    /*--------------------------- LOGIQUE ---------------------------*/
    $msg = "";
    // on test si on cliquer sur le bouton
    if(isset($_POST['connect'])){
        if($_POST['mail_util'] != "" && $_POST['pwd_util'] != ""){
            // on stock en s'assurant d'avoir nettoyer le contenu des inputs dans des variables
            $mail = cleanInput($_POST['mail_util']);
            $mdp = cleanInput($_POST['pwd_util']);
            // on instancie un nouvel objet MangerUtilisateur
            $user = new ManagerUtilisateur();
            // on set le mail à l'objet
            $user->setMailUtil($mail);
            // on cherche un compte associé à l'e-mailsaisie par l'utilisateur
            $compte = $user->getUserByEmail($bdd);
            // on verifie si un compte a été trouvé
            if($compte != null){
                // var_dump($compte);
                // on verifie si le compte est valide
                if($compte->valide_util == 1){
                    // on verifie si les mots de passe correspondent
                    if(password_verify($mdp, $compte->pwd_util)){
                        // on créé les variables de session
                        $_SESSION['id'] = $compte->id_util;
                        $_SESSION['nom'] = $compte->name_util;
                        $_SESSION['prenom'] = $compte->first_name_util;
                        $_SESSION['mail'] = $compte->mail_util;
                        $_SESSION['role'] = $compte->pwd_util;
                        $_SESSION['valide'] = $compte->valide_util;
                        $_SESSION['connected'] = true;
                        // $msg = "Connecté";
                        // redirection vers la page liste des evenements après 2s
                        redirect("/events/allEvents", 2000);
                    }
                }
                else{
                    $msg = "Un mail de confirmation vous a été envoyé, veuiller activer votre votre compte avant de revenir vous connecter";
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