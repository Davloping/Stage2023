<?php
 include 'AlgoIP.php';
 include 'class.php';

 $userTest = new Utilisateurs;
 $userTest->createUser("mamadou","mdppassisecure");

 $reponse=$_POST['Question1'];
 
$classeReponse = ClasseIp($reponse);
$ConsA='A';

 include 'navigation.php';

    if ($classeReponse!= $ConsA){
      echo '<div class="alert alert-danger" role="alert">
      A simple danger alert—check it out!
      </div>';
      echo'<a href="question1.php" class="btn btn-dark">Retour</a>';
    }
    else{
      echo '<div class="alert alert-success" role="alert">
      A simple success alert—check it out!
      </div>';
      echo'<a href="question3.php" class="btn btn-success">question suivante</a>';
    }
    
  echo'</body>
  </html>';
