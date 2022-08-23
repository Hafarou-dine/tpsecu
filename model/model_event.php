<?php
    class Event{
        /*--------------------------- ATTRIBUTS ---------------------------*/
        private ?int $id_event;
        private ?string $nom_event;
        private ?string $desc_event;
        private ?string $date_event;
        private ?int $id_type;
        

        /*--------------------------- CONSTRUCTEUR ---------------------------*/
        public function __construct(?string $nom, ?string $desc, ?string $date){
            $this->nom_event = $nom;
            $this->desc_event = $desc;
            $this->date_event = $date;
        }
        
        
        /*--------------------------- GETTERS & SETTERS ---------------------------*/
        /**
         * Get the value of id_event
         */ 
        public function getIdEvent():int{
            return $this->id_event;
        }

        /**
         * Set the value of id_event
         */ 
        public function setIdEvent(?int $id_event):void{
            $this->id_event = $id_event;
        }

        /**
         * Get the value of nom_event
         */ 
        public function getNomEvent():?string{
            return $this->nom_event;
        }

        /**
         * Set the value of nom_event
         */ 
        public function setNomEvent(?string $nom):void{
            $this->nom_event = $nom;
        }

        /**
         * Get the value of desc_event
         */ 
        public function getDescEvent():?string{
            return $this->desc_event;
        }

        /**
         * Set the value of desc_event
         */ 
        public function setDescEvent(?string $desc):void{
            $this->desc_event = $desc;
        }

        /**
         * Get the value of date_event
         */ 
        public function getDateEvent():?string{
            return $this->date_event;
        }

        /**
         * Set the value of date_event
         */ 
        public function setDateEvent(?string $date):void{
            $this->date_event = $date;
        }

        /**
         * Get the value of id_type
         */ 
        public function getIdType():?int{
            return $this->id_type;
        }

        /**
         * Set the value of id_type
         */ 
        public function setIdType(?int $id_type):void{
            $this->id_type = $id_type;
        }
    }
?>