<?php
    include 'AlgoIP.php';
    include 'navigation.php';
    $ipbin = $_POST['ipbinaire'];
    $reponse = $_POST['question7'];

    $ipdec = ipBinaryToDecimal($ipbin);


    if($reponse != $ipdec){
        echo '<div class="alert alert-danger" role="alert">
        Mauvaise réponse !
      </div>';
      echo'<a href="question7.php" class="btn btn-dark">Retour</a>';
    }
    else{
        echo "<div class='alert alert-success' role='alert'>
        Bonne réponse !
        </div>";
        echo'<a href="question4.php" class="btn btn-success">question suivante</a>';
    }

    echo'</body>
    </html>';