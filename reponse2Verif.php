<?php
    include 'AlgoIP.php';
    include 'Navigation.php';
    $ip = $_POST['ip'];
    $mask =  $_POST['mask'];
    $reponse1 = $_POST['firstAdrr'];
    $reponse2 = $_POST['broadcast'];

    $ipbin = ipDecimalToBinary($ip);
    $maskbin = ipDecimalToBinary($mask);
    $premiereAdresse = EtLogique($ipbin,$maskbin);
    $premiereAdresse = ipBinaryToDecimal($premiereAdresse);
    $maskInversé = inverseMask($maskbin);
    $broadcast = OuLogique(ipDecimalToBinary($premiereAdresse),$maskInversé);
    $broadcast = ipBinaryToDecimal($broadcast);


    if($reponse1 != $premiereAdresse){
        echo '<div class="alert alert-danger" role="alert">
        Mauvaise réponse pour la première adresse du réseau !
      </div>';
    }
    else{
        echo "<div class='alert alert-success' role='alert'>
        Bonne réponse pour la première adresse du réseau !
        </div>";
    }

    if($reponse2 != $broadcast){
      echo "<div class='alert alert-danger' role='alert'>
        Mauvaise réponse pour l'adresse de diffusion !
      </div>";
    }
    else{
      echo "<div class='alert alert-success' role='alert'>
        Bonne réponse pour l'adresse de diffusion !
        </div>";
    }

    echo'<script src="/js/bootstrap.js"></script>
    </body>
    </html>';
?>