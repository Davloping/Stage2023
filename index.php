<?php
 include 'AlgoIP.php';
echo'  
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
   
    <title>Acceuil</title>
</head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">PlaceHolder1</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">PlaceHolder2</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">PlaceHolder3</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

     <h3>Parmis ces Adresses IP, laquelle est une adresse ip de classe A</h3>';
  
      $ip1 = generateIpA();
      $ip2 = generateIpB();
      $ip3 = generateIpC();
      
      $QuestionClasse = array($ip1,$ip2,$ip3);
      shuffle($QuestionClasse);
      $bonneRéponse = $ip1 ;
    echo'
      <div>
      <table class="table mx-auto">
        <thead>
          <tr> ';
          
              for ($i=0; $i < count($QuestionClasse) ; $i++) { 
                echo "<th> Reponse ".$i+1;
                echo "</th>";
              } 
           echo'
          </tr>
        </thead>
        <tbody>
          <tr>';
           
              $i = 0;
              $reponseChoisi="";
              while($i < count($QuestionClasse)){
                echo "<td> $QuestionClasse[$i] <br>";
                echo '<input type="radio" name="Question1" value="'.$QuestionClasse[$i].'"/>';
                $i++;
              }
          echo'
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td></td>
            <td>
              <input type="submit" value="Valider">
              <input type="reset" value="reset">
            </td>
          </tr>
        </tfoot>
      </table>'
     ;
        if(isset($_POST['Question1'])){
          $reponseChoisi = $_POST['Question1'];
        }
        else{
          echo "aucune réponse sélectionné";
        }
        echo "<br>";
        echo $reponseChoisi;
        echo $bonneRéponse;
        echo'
  
    </div>
  <script src="/js/bootstrap.js"></script>
  </body>
</html>';
?>