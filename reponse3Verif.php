<?php
    include 'AlgoIP.php';
    include 'navigation.php';
    $ip = $_POST['ip'];
    $reponse = $_POST['question3a'];

    $ipbin = ipDecimalToBinary($ip);


    if($reponse != $ipbin){
        echo '<div class="alert alert-danger" role="alert">
        Mauvaise réponse !
      </div>';
      echo'<a href="question3.php" class="btn btn-dark">Retour</a>';
    }
    else{
        echo "<div class='alert alert-success' role='alert'>
        Bonne réponse !
        </div>";
        echo'<a href="question7.php" class="btn btn-success">question suivante</a>';
    }

    echo'</body>
    </html>';
?>