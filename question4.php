<?php 
    include 'AlgoIP.php';
    include 'Navigation.php';

    $binaire1 = DecimalToBinary(rand(1,255));
    $binaire1 = str_pad($binaire1,8,"0",STR_PAD_LEFT);
    $binaire2 = DecimalToBinary(rand(1,255));
    $binaire2 = str_pad($binaire2,8,"0",STR_PAD_LEFT);

    echo'<form action="reponse4Verif.php" method="POST">';
    echo "<h3>effectuer un ETlogique entre ces deux nombres écrit en binaire et donez le résultat</h3><br>";
    echo '<table class="table">
        <thead>
            <tr>
                <th>'.$binaire1."<br><br>".$binaire2.'</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="text" name="question4a">
                </td>
            </tr>
        </tbody>
    </table>';
    echo '<input type="hidden" name="binaire1" value="'.$binaire1.'">';
    echo '<input type="hidden" name="binaire2" value="'.$binaire2.'">';


    echo "<br><br><br>";

    echo "<h3>écrire le résultat trouvé sous forme décimal</h3><br>";
    echo '<table class="table">
        <tbody>
            <tr>
                <td>
                    <input type="text" name="question4b">
                </td>
            </tr>
        </tbody>
    </table>';

    echo '<input type="submit" value="valider">';
    echo '</form>';
?>