<?php
 include 'AlgoIP.php';
 include 'Navigation.php';

 echo'  


     <h3>Parmis ces Adresses IP, laquelle est une adresse ip de classe A</h3>';
  
      $ip1 = generateIpA();
      $ip2 = generateIpB();
      $ip3 = generateIpC();
      
      $QuestionClasse = array($ip1,$ip2,$ip3);
      shuffle($QuestionClasse);
      $bonneRéponse = $ip1 ;
      
    echo'
      <div>
      <form action="reponse1Verif.php" method="GET">
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
      </table>
      </form>'
     ;
        
      
        //echo $bonneRéponse;
        echo'
  
    </div>
  <script src="/js/bootstrap.js"></script>
  </body>
</html>';
?>