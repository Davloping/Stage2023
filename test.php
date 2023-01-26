<?php
    include 'class.php';

    $utilisateur = new Utilisateurs;

    $utilisateur->createUser($_POST['nom'],$_POST['mdp']);
    $utilisateur->showUser();
?>