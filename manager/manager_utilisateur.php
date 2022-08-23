<?php
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    


    class ManagerUtilisateur extends Utilisateur{
        /*--------------------------- METHODS ---------------------------*/
        /**
         * Methode qui permet d'ajouter un nouvel utilisateur en BDD
         */
        public function createUser(object $bdd):void{
            try{
                $name = $this->getNameUtil();
                $firstName = $this->getFirstNameUtil();
                $mail = $this->getMailUtil();
                $pwd = $this->getPwdUtil();
                $token = $this->getTokenUtil();
                $req = $bdd->prepare('INSERT INTO utilisateur(name_util, first_name_util, mail_util, pwd_util, token_util) 
                VALUES(?, ?, ?, ?, ?);');
                $req->bindparam(1, $name, PDO::PARAM_STR);
                $req->bindparam(2, $firstName, PDO::PARAM_STR);
                $req->bindparam(3, $mail, PDO::PARAM_STR);
                $req->bindparam(4, $pwd, PDO::PARAM_STR);
                $req->bindparam(5, $token, PDO::PARAM_STR);
                $req->execute();
            }
            catch(Exception $e){
                // affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }

        /**
         * Methode qui recupere les informations d'un utilisateur par son e-mail 
         */
        public function getUserByEmail(object $bdd){
            try{
                $mail = $this->getMailUtil();
                $req = $bdd->prepare('SELECT id_util, name_util, first_name_util, mail_util, pwd_util, token_util, valide_util, id_role 
                FROM utilisateur
                WHERE mail_util = ?;');
                $req->bindparam(1, $mail, PDO::PARAM_STR);
                $req->execute();
                return $req->fetch(PDO::FETCH_OBJ);
            }
            catch(Exception $e){
                // affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }

        /**
         * Methode qui permet d'envoyer un mail
         * Ici avec un compte outlook
         */
        public function sendMail(?string $userMail, ?string $subject, ?string $message, string $email_smtp, string $mdp_smtp){
            // Load Composer's autoloader
            require 'vendor/autoload.php';

            // Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try{
                // Server settings
                $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.office365.com';                   // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = $email_smtp;                            // SMTP username
                $mail->Password   = $mdp_smtp;                              // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable implicit TLS encryption
                $mail->Port       = 587;                                    // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                // Recipients
                $mail->setFrom($email_smtp, 'Hafarou-dine Ousseni');
                $mail->addAddress($userMail);                               // Add a recipient
                // $mail->addAddress('ellen@example.com');                  // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                // Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');            // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');       // Optional name

                // Content
                $mail->isHTML(true);                                        // Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $message;
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                // echo '<div>Message has been sent</div>';
            }
            catch(Exception $e){
                echo "<div>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
            }
        }

        /**
         * Fonction qui recupére un utilisateur par son token
         */
        public function getUserByToken(object $bdd){
            try{
                $token = $this->getTokenUtil();
                $req = $bdd->prepare('SELECT id_util, name_util, first_name_util, mail_util, pwd_util, token_util, valide_util, id_role 
                FROM utilisateur
                WHERE token_util = ?;');
                $req->bindparam(1, $token, PDO::PARAM_STR);
                $req->execute();
                return $req->fetch(PDO::FETCH_OBJ);
            }
            catch(Exception $e){
                // affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }

        /**
         * Fonction d'activation d'un compte
         */
        public function activateUser(object $bdd):void{
            try{
                $token = $this->getTokenUtil();
                $req = $bdd->prepare('UPDATE utilisateur
                SET valide_util = 1
                WHERE token_util = ?;');
                $req->bindparam(1, $token, PDO::PARAM_STR); 
                $req->execute();
            }
            catch(Exception $e){
                // affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }

    }
?>