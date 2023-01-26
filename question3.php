<?php 
    include 'AlgoIP.php';
    include 'Navigation.php';

    $ip = generateIpC();
    $ipbinaire = ipDecimalToBinary(generateIpC());

    echo'<form action="reponse3Verif.php" method="POST">';
    echo "<h3>écrire forme binaire de l'adresse suivante</h3><br>";
    echo '<table class="table">
        <thead>
            <tr>
                <th>'.$ip.'</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="text" name="question3a">
                </td>
            </tr>
        </tbody>
    </table>';
    echo '<input type="hidden" name="ip" value="'.$ip.'">';


    echo "<br><br><br>";

    echo "<h3>écrire forme decimal de l'adresse suivante</h3><br>";
    echo '<table class="table">
        <thead>
            <tr>
                <th>'.$ipbinaire.'</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="text" name="question3b">
                </td>
            </tr>
        </tbody>
    </table>';

    echo '<input type="hidden" name="ipbinaire" value="'.$ipbinaire.'">';
    echo '<input type="submit" value="valider">';
    echo '</form>';
?>