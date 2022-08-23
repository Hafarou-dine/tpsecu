<?php
    class Utilisateur{
        /*--------------------------- ATTRIBUTS ---------------------------*/
        private ?int $id_util;
        private ?string $name_util;
        private ?string $first_name_util;
        private ?string $mail_util;
        private ?string $pwd_util;
        private ?string $token_util;
        private ?int $active_util;
        private ?int $id_role;

        
        /*--------------------------- CONSTRUCTEUR ---------------------------*/
        public function __construct(){}

        
        /*--------------------------- GETTERS & SETTERS ---------------------------*/
        /**
         * Get the value of id_util
         */ 
        public function getIdUtil():?int{
            return $this->id_util;
        }

        /**
         * Set the value of id_util
         */ 
        public function setIdUtil(?int $id):void{
            $this->id_util = $id;
        }

        /**
         * Get the value of name_util
         */ 
        public function getNameUtil():?string{
            return $this->name_util;
        }

        /**
         * Set the value of name_util
         */ 
        public function setNameUtil(?string $name):void{
            $this->name_util = $name;
        }

        /**
         * Get the value of first_name_util
         */ 
        public function getFirstNameUtil():?string{
            return $this->first_name_util;
        }

        /**
         * Set the value of first_name_util
         */ 
        public function setFirstNameUtil(?string $first_name):void{
            $this->first_name_util = $first_name;
        }

        /**
         * Get the value of mail_util
         */ 
        public function getMailUtil():?string{
            return $this->mail_util;
        }

        /**
         * Set the value of mail_util
         */ 
        public function setMailUtil(?string $mail):void{
            $this->mail_util = $mail;
        }

        /**
         * Get the value of pwd_util
         */ 
        public function getPwdUtil():?string{
            return $this->pwd_util;
        }

        /**
         * Set the value of pwd_util
         */ 
        public function setPwdUtil(?string $pwd):void{
            $this->pwd_util = $pwd;
        }

        /**
         * Get the value of token_util
         */ 
        public function getTokenUtil():?string{
            return $this->token_util;
        }

        /**
         * Set the value of token_util
         */ 
        public function setTokenUtil(?string $token):void{
            $this->token_util = $token;
        }

        /**
         * Get the value of active_util
         */ 
        public function getActiveUtil():?int{
            return $this->active_util;
        }

        /**
         * Set the value of active_util
         */ 
        public function setActive_util(?int $active_util):void{
            $this->active_util = $active_util;
        }

        /**
         * Get the value of id_role
         */ 
        public function getIdRole():?int{
            return $this->id_role;
        }

        /**
         * Set the value of id_role
         */ 
        public function setIdRole(?int $role):void{
            $this->id_role = $role;
        }
        

        
    }
?>