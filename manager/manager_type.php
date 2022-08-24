<?php 
class ManagerType extends Type{
        /*--------------------------- METHODS ---------------------------*/
/**
 * fonction qui renvoi la liste des types
 */
public function getAllType($bdd){
    try{
        $req = $bdd->prepare('SELECT id_type, nom_type
        FROM tpsecu.type;');
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