<?php 
    include 'AlgoIP.php';
    include 'navigation.php';

    $ip = generateIpC();
    $mask = generateMask24();
    $ipbin = ipDecimalToBinary($ip);
    $maskbin = ipDecimalToBinary($mask);
    $maskInversé = inverseMask($maskbin);
    $premiereAdresse = EtLogique($ipbin,$maskbin);
    $premiereAdresse = ipBinaryToDecimal($premiereAdresse);
    $broadcast = OuLogique(ipDecimalToBinary($premiereAdresse),$maskInversé);
    $broadcast = ipBinaryToDecimal($broadcast);
    echo'<form action="reponse6Verif.php" method="POST">';
    echo "<h3>En fonction de l'adresse ip et le masque si dessous, donnez l'adresse de diffusion</h3><br>";
    echo $ip."<br>";
    echo '<input type="hidden" name="ip" value="'.$ip.'">';
    echo $mask."<br>";
    echo '<input type="hidden" name="mask" value="'.$mask.'">';
    echo 'Adresse de diffusion : <input type="text" name="broadcast">'.$broadcast.'<br>';
    echo '<input type="submit" value="valider">';
    echo '</form>';