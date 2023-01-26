<?php
    include 'AlgoIP.php';
    include 'Navigation.php';
    $ip = $_POST['ip'];
    $reponse = $_POST['question3a'];

    $ipbin = ipDecimalToBinary($ip);

    $ipbinaire = $_POST['ipbinaire'];
    $reponse2 = $_POST['question3b'];

    $ipdecimal = ipBinaryToDecimal($ipbinaire);


    if($reponse != $ipbin){
        echo '<div class="alert alert-danger" role="alert">
        Mauvaise réponse !
      </div>';
    }
    else{
        echo "<div class='alert alert-success' role='alert'>
        Bonne réponse !
        </div>";
    }

    if($reponse2 != $ipdecimal){
        echo '<div class="alert alert-danger" role="alert">
        Mauvaise réponse !
      </div>';
    }
    else{
        echo "<div class='alert alert-success' role='alert'>
        Bonne réponse !
        </div>";
    }

    echo'<script src="/js/bootstrap.js"></script>
    </body>
    </html>';
?>