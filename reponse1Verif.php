<?php
 include 'AlgoIP.php';
 $reponse=$_GET['Question1'];
 
$classeReponse = ClasseIp($reponse);
$ConsA='A';

 echo'  
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
   
    <title>Acceuil</title>
</head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">PlaceHolder1</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">PlaceHolder2</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">PlaceHolder3</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>';

    if ($classeReponse!= $ConsA){
        echo '<div class="alert alert-danger" role="alert">
        A simple danger alert—check it out!
      </div>';
    }else{
    echo '<div class="alert alert-success" role="alert">
    A simple success alert—check it out!
  </div>';
    }
  echo'
    </div>
  <script src="/js/bootstrap.js"></script>
  </body>
</html>';
