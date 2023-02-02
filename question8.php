<?php
 include 'AlgoIP.php';
 include 'navigation.php';

 echo'  


     <h3>Parmis ces Adresses IP, laquelle est une adresse ip de classe A</h3>';

      $ip = generateIpC();
      $mask = generateMask24();
      $ipbinaire = ipDecimalToBinary($ip);
      $maskbinaire = ipDecimalToBinary($mask);
      $premiereaddresse = ETlogique($ipbinaire,$maskbinaire);
      $maskinversé = inverseMask($maskbinaire);
      $diffusion = OUlogique($premiereaddresse,$maskinversé);
      $diffusion = ipBinaryToDecimal($diffusion);
      $diffusionarray = explode(".",$diffusion);
      var_dump($diffusionarray[3]);
      $diffusionarray[3] = intval($diffusionarray[3])-1;
      var_dump($diffusionarray[3]);
      $diffusionarray[3] = strval($diffusionarray[3]);
      var_dump($diffusionarray[3]);
      $derniereaddresse = "$diffusionarray[0].$diffusionarray[1].$diffusionarray[2].$diffusionarray[3]";
      var_dump($derniereaddresse);


    echo'
      <form action="reponse8Verif.php" method="POST">
        <div class="container-md">
          <table class="table mx-auto">
            <thead>
              <tr class="text-center">'.$ip.'<br>'.$mask.'</tr>
            </thead>
            <tbody>
              <tr>
              </tr>
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
      </form>'
     ;
        
 echo'</body>
  </html>';
?>