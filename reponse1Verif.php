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
    }
    else{
      echo '<div class="alert alert-success" role="alert">
      A simple success alert—check it out!
      </div>';
      $userTest->showPts();
      echo "<br>";
      $userTest->pointSupp();
      $userTest->showPts();
    }
  echo'
    </div>
  <script src="/js/bootstrap.js"></script>
  </body>
</html>';
