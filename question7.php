<?php 
    include 'AlgoIP.php';
    include 'navigation.php';
    $ipbinaire = ipDecimalToBinary(generateIpC());

    echo'<form action="reponse7Verif.php" method="POST">';
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
                    <input type="text" name="question7">
                </td>
            </tr>
        </tbody>
    </table>';
    echo '<input type="hidden" name="ipbinaire" value="'.$ipbinaire.'">';
    echo '<input type="submit" value="valider">';
    echo '</form>';

    echo'</body>
    </html>';
?>