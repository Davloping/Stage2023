<?php 
    include 'AlgoIP.php';
    include 'navigation.php';

    $ip = generateIpC();

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
    echo '<input type="submit" value="valider">';
    echo '</form>';

    echo'</body>
    </html>';
?>