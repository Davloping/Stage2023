<?php 
    include 'AlgoIP.php';
    include 'Navigation.php';

    $ip = generateIpC();
    $mask = generateMask24();
    echo'<form action="reponse2Verif.php" method="POST">';
    echo "<h3>En fonction de l'adresse ip et le masque si dessous, donnez la première adresse disponible et l'adresse de diffusion</h3><br>";
    echo $ip."<br>";
    echo $mask."<br>";
    echo '<input type="text" name="octet4" placeholder="dernier octet">';
    echo '<input type="submit" value="valider">';
    echo '</form>';
    
?>