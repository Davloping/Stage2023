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