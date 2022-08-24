<?php 
    class Type{
        /*--------------------------- ATTRIBUTS ---------------------------*/
        private ?int $id_type;
        private ?string $nom_type;
        

        /*--------------------------- CONSTRUCTEUR ---------------------------*/
        public function __construct(){
        }
        
        
        /*--------------------------- GETTERS & SETTERS ---------------------------*/
        /**
         * Get the value of id_type
         */ 
        public function getIdType():int{
            return $this->id_type;
        }

        /**
         * Set the value of id_type
         */ 
        public function setIdType(?int $id):void{
            $this->id_type = $id;
        }

        /**
         * Get the value of nom_type
         */ 
        public function getNomType():?string{
            return $this->nom_type;
        }

        /**
         * Set the value of nom_type
         */ 
        public function setNomType(?string $nom):void{
            $this->nom_type = $nom;
        }
    }
?>