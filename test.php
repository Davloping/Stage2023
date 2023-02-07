<?php
    require_once 'navigation.php';
    require_once 'classQuizz.php';

    $question = $_POST['question'];
    $reponse = $_POST['reponse'];
    
    $varBdd = [];
    $Quizz = new Quizz;
    $Quizz->createQuizz($question,$reponse);
    array_push($varBdd,$Quizz);
    var_dump($varBdd);

?>