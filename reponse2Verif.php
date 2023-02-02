<?php
    include 'AlgoIP.php';
    include 'navigation.php';
    $ip = $_POST['ip'];
    $mask =  $_POST['mask'];
    $reponse1 = $_POST['firstAdrr'];

    $ipbin = ipDecimalToBinary($ip);
    $maskbin = ipDecimalToBinary($mask);
    $premiereAdresse = EtLogique($ipbin,$maskbin);
    $premiereAdresse = ipBinaryToDecimal($premiereAdresse);


    if($reponse1 != $premiereAdresse){
        echo '<div class="alert alert-danger" role="alert">
        Mauvaise réponse pour la première adresse du réseau !
      </div>';
      echo'<a href="question2.php" class="btn btn-dark">Retour</a>';
    }
    else{
        echo "<div class='alert alert-success' role='alert'>
        Bonne réponse pour la première adresse du réseau !
        </div>";
        echo'<a href="question6.php" class="btn btn-success">question suivante</a>';
    }

    echo'</body>
    </html>';
?>