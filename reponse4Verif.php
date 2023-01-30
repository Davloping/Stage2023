<?php
    include 'AlgoIP.php';
    include 'navigation.php';
    $binaire1 = $_POST['binaire1'];
    $binaire2 = $_POST['binaire2'];
    $reponse = $_POST['question4a'];
    $reponse2 = $_POST['question4b'];

    $resultat1 = ETlogique($binaire1,$binaire2);

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