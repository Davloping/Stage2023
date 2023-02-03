<?php
 include 'AlgoIP.php';
 include 'navigation.php';

 echo'  


     <h3>En vous servant de l adresse ip et le masque ci-dssous,déterminez le sous réseau et choisissez la réponse correspndant à la dernière adresse pouvant être attibuer à une machine</h3>';

      $ip = generateIpC();
      $mask = generateMask24();
      $ipBinaire = ipDecimalToBinary($ip);
      $maskBinaire = ipDecimalToBinary($mask);
      $premiereAdresseBin = ETlogique($ipBinaire,$maskBinaire);
      $premiereAdresse = ipBinaryToDecimal($premiereAdresseBin);
      $maskInverseBin = inverseMask($maskBinaire);
      $diffusionBin = OUlogique($premiereAdresseBin,$maskInverseBin);
      $diffusion = ipBinaryToDecimal($diffusionBin);
      $diffusionarray = explode(".",$diffusion);
      $premiereaddressearray = explode(".",$premiereAdresse);
      $octet4last = intval($diffusionarray[3])-1;
      $derniereaddresse = "$diffusionarray[0].$diffusionarray[1].$diffusionarray[2].$octet4last";
      $option1 = $derniereaddresse;
      $option2 = "$diffusionarray[0].$diffusionarray[1].$diffusionarray[2].".rand(intval($premiereaddressearray[3]),intval($diffusionarray[3]));
      $option3 = "$diffusionarray[0].$diffusionarray[1].$diffusionarray[2].".rand(intval($premiereaddressearray[3]),intval($diffusionarray[3]));
      $reponses = [$option1,$option2,$option3];
      shuffle($reponses);

      // $choix1 = "$diffusionarray[0].$diffusionarray[1].$diffusionarray[2].".rand(intval($premiereaddressearray[3]),$diffusionarray[3]+1);
      // var_dump($choix1);
      
      
      


    echo'
      <form action="reponse8Verif.php" method="POST">
        <div class="container-md">
          <table class="table mx-auto">
            <thead>
              <tr class="text-center">'.$ip.'<br>'.$mask.'</tr>
            </thead>
            <tbody>
              <tr>';
                for($i=0;$i<count($reponses);$i++){
                  echo "<td>".$reponses[$i]."<br>";

                  echo '<input type="radio" name="Question8" value="'.$reponses[$i].'"/>
                  </td>';
                  
                }
                echo '</tr>
            </tbody>
            <tfoot>
              <tr>
                <td>
                  <input type="submit" value="Valider">
                  <input type="reset" value="reset">
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <input type="hidden" name="breponse" value="'.$derniereaddresse.'">
      </form>'
     ;
        
 echo'</body>
  </html>';
?>