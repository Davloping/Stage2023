<?php 
    class Utilisateurs{
        public $identifiant;
        public $mdp;
        public $pts = 0;

        function createUser($username,$password){
            $this->identifiant = $username;
            $this->mdp = $password;
            $this->pts = 0;
        }

        function showUser(){
            echo "nom d'utilisateurs : ".$this->identifiant."<br>mot de passe : ".$this->mdp."<br>nombre de points : ".$this->pts;
        }

        function pointSupp(){
            $this->pts = $this->pts + 1;
        }

        function showPts(){
            echo "vous avez ".$this->pts." points";
        }
    }
?>