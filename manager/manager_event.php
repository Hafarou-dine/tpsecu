<?php
    class ManagerEvent extends Event{
        /*--------------------------- METHODS ---------------------------*/
        /**
         * Fonction pour ajouter un evenement
         */
        public function addEvent($bdd){
            try{
                $nom = $this->getNomEvent();
                $desc = $this->getDescEvent();
                $date = $this->getDateEvent();
                $type = $this->getIdType();
                $req = $bdd->prepare('INSERT INTO evenement(nom_event, desc_event, date_event, id_type) VALUES(?, ?, ?, ?);');
                $req->bindparam(1, $nom, PDO::PARAM_STR);
                $req->bindparam(2, $desc, PDO::PARAM_STR);
                $req->bindparam(3, $date, PDO::PARAM_STR);
                $req->bindparam(4, $type, PDO::PARAM_INT);
                $req->execute();
            }
            catch(Exception $e){
                // affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }

        /**
         * Fonction qui renvoie mla liste des events
         */
        public function getAllEvents($bdd){
            try{
                $req = $bdd->prepare('SELECT id_event, nom_event, desc_event, date_event, nom_type 
                FROM evenement
                INNER JOIN tpsecu.type
                WHERE evenement.id_type = tpsecu.type.id_type
                ORDER BY id_event ASC;');
                $req->execute();
                return $req->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e){
                // affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
    }
?>