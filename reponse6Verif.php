<?php
    include 'AlgoIP.php';
    include 'navigation.php';
    $ip = $_POST['ip'];
    $mask =  $_POST['mask'];
    $reponse2 = $_POST['broadcast'];

    $ipbin = ipDecimalToBinary($ip);
    $maskbin = ipDecimalToBinary($mask);
    $premiereAdresse = EtLogique($ipbin,$maskbin);
    $premiereAdresse = ipBinaryToDecimal($premiereAdresse);
    $maskInversé = inverseMask($maskbin);
    $broadcast = OuLogique(ipDecimalToBinary($premiereAdresse),$maskInversé);
    $broadcast = ipBinaryToDecimal($broadcast);

    if($reponse2 != $broadcast){
      echo "<div class='alert alert-danger' role='alert'>
        Mauvaise réponse pour l'adresse de diffusion !
      </div>";
      echo'<a href="question6.php" class="btn btn-dark">Retour</a>';
    }
    else{
      echo "<div class='alert alert-success' role='alert'>
        Bonne réponse pour l'adresse de diffusion !
        </div>";
      echo'<a href="question8.php" class="btn btn-success">question suivante</a>';
    }

    echo'</body>
    </html>';
?>