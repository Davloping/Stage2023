<?php
class Quizz{
    public $idquizz;
    public $question;
    public $reponse;

    function createQuizz($questions,$reponses){
        $this->idquizz = 0;
        $this->question = $questions;
        $this->reponse = $reponses;
    }

    function addQuizz(){
        //ajouter l'obet dans la db
    }

    function getIdQuizz(){
        return $this->idquizz;
    }

    function getQuestionQuizz(){
        return $this->question;
    }

    function getReponseQuizz(){
        return $this->reponse;
    }

    function fetchQuizz(){
        //récupérer objet dans la db
    }

    function showfetchQuizz(){
        //addQuizz() + fetchQuizz()
    }



    
}
?>