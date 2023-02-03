<?php
 include 'AlgoIP.php';
 $bonneReponse = $_POST['breponse'];
 $choix = $_POST['Question8'];

 include 'navigation.php';

    if ($choix != $bonneReponse){
      echo '<div class="alert alert-danger" role="alert">
      A simple danger alert—check it out!
      </div>';
      echo'<a href="question8.php" class="btn btn-dark">Retour</a>';
    }
    else{
      echo '<div class="alert alert-success" role="alert">
      A simple success alert—check it out!
      </div>';
    }
    
  echo'</body>
  </html>';
?>