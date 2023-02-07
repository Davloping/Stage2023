<?php 

    include 'navigation.php';
    require_once 'classQuizz.php';

    //cette page utilise la classe Quizz pour créer un objet à partir du texte rentrer dans les 2 barres en début de page
    echo'<form action="createQuestion.php" method="POST">
        <label for="question">insérer questions</label><input type="text" name="question" id="question"><br>
        <label for="reponse">insérer reponse à question</label><input type="text" name="reponse" id="reponse"><br>
        <input type="submit" value="Valider">
        <input type="reset" value="effacer">
    </form>';
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $question = $_POST['question'];
        $reponse = $_POST['reponse'];

        //une fois validé l'objet est insérer dans une liste qui fait temporairement office de base de données
        $varBdd = [];
        $Quizz = new Quizz;
        $Quizz->createQuizz($question,$reponse);
        array_push($varBdd,$Quizz);

        //la page affiche le contenu de la liste dans un tableau
        echo'<form action="createQuestion.php" method="POST">
            <table class="table">
                <thead>thead</thead>
                <tbody>
                    <tr>';
                        //la colone de droite contient la question ainsi que l'id de la question (pour l'instant toujours égal à 0)
                        echo'<td>'.$varBdd[0]->getQuestionQuizz().'</td>';
                        //la colone de gauche contient la reponse entrée et une barre de texte
                        echo'<td>'.$varBdd[0]->getReponseQuizz().'<br><input type="text" name="valeurReponse"></td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Valider">
        </form>';
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            //lorsque l'on remplit la barre de texte de la réponse, si la donnée entré est égal à l'id de la question, la réponse sea compté bonne et si elle n'est pas égal elle sera compté fausse
            if($_POST['valeurReponse'] == $varBdd[0]->getIdQuizz()){
                echo "<div class='alert alert-success' role='alert'>
                Bonne réponse !
                </div>";
            }
            else{
                echo '<div class="alert alert-danger" role="alert">
                Mauvaise réponse !
                </div>';
            }
        }

    }

    //la page affiche des erreurs à plusieurs étape puisque la page est rechargé à chaque fois maisl'exercie fonctionne malgré ça
?>