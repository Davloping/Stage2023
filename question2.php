<?php 
    include 'AlgoIP.php';
    include 'navigation.php';

    $ip = generateIpC();
    $mask = generateMask24();
    $ipbin = ipDecimalToBinary($ip);
    $maskbin = ipDecimalToBinary($mask);
    $premiereAdresse = EtLogique($ipbin,$maskbin);
    $premiereAdresse = ipBinaryToDecimal($premiereAdresse);

    echo'<form action="reponse2Verif.php" method="POST">';
    echo "<h3>En fonction de l'adresse ip et le masque si dessous, donnez la première adresse disponible</h3><br>";
    echo "adresse IP : ".$ip."<br>";
    echo '<input type="hidden" name="ip" value="'.$ip.'">';
    echo "masque : ".$mask."<br>";
    echo '<input type="hidden" name="mask" value="'.$mask.'">';
    echo 'Première adresse : <input type="text" name="firstAdrr">';
    echo '<input type="submit" value="valider">';
    echo '</form>';

    echo'</body>
    </html>';
?>