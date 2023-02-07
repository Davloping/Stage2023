<?php
  echo'
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <script defer src="/js/bootstrap.js"></script>
  
  <title>Acceuil</title>
</head>
  <body class="text-center">
    <nav class="navbar navbar-expand-lg navbar-black bg-black">
      <a class="navbar-brand" href="#">
        <div id="main">
          <button class="openbtn" onclick="openNav()">☰</button>
        </div>
      </a>
      <div class="collapse navbar-collapse" id="navbarColor02"></div>
    </nav>
    <div id="mySidebar" class="sidebar">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
      <a href="index.php">Exercices</a>
      <a href="inscription.php">Inscription</a>
      <a href="connexion.php">Connexion</a>
      <a href="createQuestion.php">exercice questions relier (wip)</a>
    </div>

    <script defer>
    function openNav() {
      document.getElementById("mySidebar").style.width = "250px";
      document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
      document.getElementById("mySidebar").style.width = "0";
      document.getElementById("main").style.marginLeft= "0";
    }
    </script>';
  ?>