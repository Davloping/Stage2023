<?php 
    include 'AlgoIP.php';
    include 'Navigation.php';

    $ip = generateIpC();
    var_dump($ip);
    $mask = generateMask24();
    var_dump($mask);
    $ipbin = ipDecimalToBinary($ip);
    $maskbin = ipDecimalToBinary($mask);
    $premiereAdresse = EtLogique($ipbin,$maskbin);
    $premiereAdresse = ipBinaryToDecimal($premiereAdresse);
    $maskInversé = inverseMask($maskbin);
    $broadcast = OuLogique(ipDecimalToBinary($premiereAdresse),$maskInversé);
    $broadcast = ipBinaryToDecimal($broadcast);

    echo'<form action="reponse2Verif.php" method="POST">';
    echo "<h3>En fonction de l'adresse ip et le masque si dessous, donnez la première adresse disponible et l'adresse de diffusion</h3><br>";
    echo $ip."<br>";
    echo '<input type="hidden" name="ip" value="'.$ip.'">';
    echo $mask."<br>";
    echo '<input type="hidden" name="mask" value="'.$mask.'">';
    echo 'Première adresse : <input type="text" name="firstAdrr">'.$premiereAdresse.'<br>';
    echo 'Adresse de diffusion : <input type="text" name="broadcast">'.$broadcast.'<br>';
    echo '<input type="submit" value="valider">';
    echo '</form>';
?>