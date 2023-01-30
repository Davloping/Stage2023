<?php
    include 'AlgoIP.php';
    include 'navigation.php';
    $ipbin = $_POST['ipbinaire'];
    $reponse = $_POST['question7'];

    $ipdec = ipBinaryToDecimal($ipbin)


    if($reponse != $ipdec){
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