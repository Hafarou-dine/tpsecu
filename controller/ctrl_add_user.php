<?php
    /*--------------------------- IMPORTS ---------------------------*/
    include './utils/connectBdd.php';
    include './utils/functions.php';
    include './utils/smtp_datas.php';
    include './model/model_utilisateur.php';
    include './manager/manager_utilisateur.php';
    include './view/view_add_user.html';
    
    
    /*--------------------------- LOGIQUE ---------------------------*/
    $msg = "";
    // on test si on a cliquer sur le boutton
    if(isset($_POST['create'])){
        // on testsi les champs ne sont pas vide
        if($_POST['name_util'] != "" && $_POST['first_name_util'] != "" && 
        $_POST['mail_util'] != "" && $_POST['pwd_util'] != "" && $_POST['confirm_pwd'] != ""){
            // verfication de la correspondance des mots de passe
            if($_POST['pwd_util'] === $_POST['confirm_pwd']){
                // on nettoie et on stock le contenu inputs dans des variables
                $nom = firstLetterToUpper(cleanInput($_POST['name_util']));
                $prenom = firstLetterToUpper(cleanInput($_POST['first_name_util']));
                $mail = cleanInput($_POST['mail_util']);
                $mdp = cleanInput($_POST['pwd_util']);
                // on instancie un nouveau manger
                $user = new ManagerUtilisateur();
                // on set le mail au manager
                $user->setMailUtil($mail);
                // on cherche un compte en BDD avec le même e-mail 
                // Pour ne pas avoir de doublons en BDD
                $compte = $user->getUserByEmail($bdd);
                // on verifie si aucun compte associé a cet e-meil n'a été trouvé
                if($compte == null){
                    // on hash le mot de passe
                    $hash = password_hash($mdp, PASSWORD_BCRYPT, array('cost' => 10));
                    // on hash le mail pour avoir le token_util
                    $token = md5($mail);
                    // on set les autres variables au manager
                    $user->setNameUtil($nom);
                    $user->setFirstNameUtil($prenom);
                    $user->setPwdUtil($hash);
                    $user->setTokenUtil($token);
                    // on enregistre le compte en BDD
                    $user->createUser($bdd);
                    $msg = 'Création du compte '.$nom.' '.$prenom.'<br>
                    Un e-mail de confirmation vous a été envoyé a votre adresse mail';

                    /*--------------------------- Envoie du mail de confirmation du compte ---------------------------*/
                    // on instancie un nouveau manager
                    $util = new ManagerUtilisateur();
                    // on créer les variables necessaires à l'envoie du mail
                    $subject = utf8_decode("Création d'un compte utilisateur");
                    $message = utf8_decode('
                    <h3>Bonjour,</h3>
                    <div>Votre compte utilisateur a ete cree</div>
                    <div>Merci de confirmer votre compte en allant sur le lien suivant</div>
                    <a href="http://localhost/events/activate?id='.$token.'">Lien de confirmation</a><br><br>
                    <div>Cordialement</div>
                    <div>Hafarou-dine Ousseni</div>');
                    $util->sendMail($mail, $subject, $message, $email_smtp, $mdp_smtp);
                }
                else{
                    $msg = "Information incorrectes";
                }
            }
            else{
                $msg = "Les deux mots de passe doivent être identique";
            }
        }
        else{
            $msg = "Les chapms sont vide";
        }
    }
    else{
        $msg = "Cliquer sur le bouton pour créer un compte";
    }
    echo '
    <script>
        ecrireMsg("'.$msg.'");
    </script>';
?>