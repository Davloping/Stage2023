<?php
    include 'AlgoIP.php';
    include 'navigation.php';
    $binaire1 = $_POST['binaire1'];
    $binaire2 = $_POST['binaire2'];
    $reponse = $_POST['question5a'];
    $reponse2 = $_POST['question5b'];

    $resultat1 = OUlogique($binaire1,$binaire2);

    $resultat2 = BinaryToDecimal($resultat1);


    if($reponse != $resultat1){
        echo '<div class="alert alert-danger" role="alert">
        Mauvaise réponse !
      </div>';
    }
    else{
        echo "<div class='alert alert-success' role='alert'>
        Bonne réponse !
        </div>";
    }

    if($reponse2 != $resultat2){
        echo '<div class="alert alert-danger" role="alert">
        Mauvaise réponse !
      </div>';
      echo'<a href="question5.php" class="btn btn-dark">Retour</a>';
    }
    else{
        echo "<div class='alert alert-success' role='alert'>
        Bonne réponse !
        </div>";
        echo'<a href="question2.php" class="btn btn-success">question suivante</a>';
    }

    echo'</body>
    </html>';
?>