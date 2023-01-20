<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP RAND</title>
</head>
<body>
    <?php 
        $A = rand(0,255);
        $B = rand(0,255);
        $C = rand(0,255);
        $D = rand(1,254);

        $ipDec = "$A.$B.$C.$D";

        function ClasseIp($ipa){
            $octet = explode(".",$ipa);
            $result;
            if ($octet[0] > 0 && $octet[0] <= 127){
                $result = "classe A";
            }
            elseif($octet[0] >= 128 && $octet[0] <= 191){
                $result = "classe B";
            }

            elseif($octet[0] >= 192 && $octet[0] <= 223){
                $result = "classe C";
            }
            else{
                $result = "autre";
            }

            return $result;
        }

        function verifIp(){
            if(filter_var($ip, FILTER_VALIDATE_IP)){
                echo("$ip est valide");
            }
            else{
                echo("non");
            }
        }

        function DectToBI($Dec){

            $binary = "";
            while($Dec > 0){
                $binary = ($Dec % 2).$binary;
                $Dec = floor($Dec/2);
                
            }
            return $binary;
        }

        function ipDecToBi($ipDec){

            $binaryIP="";
            $ipArray = explode(".",$ipDec);
            foreach ($ipArray as $octet){
                $octetBin = DectToBI($octet);
                $octetBin = str_pad($octetBin,8,"0",STR_PAD_LEFT);
                $binaryIP.=$octetBin.".";
            }
            $binaryIP=substr($binaryIP,0,-1);
            return $binaryIP;
        }

        function BinaryToDecimal($bin){
            $dec = 0;
            $binArray = str_split($bin);
            $binArray = array_reverse($binArray);
            for($i=0;$i<count($binArray);$i++){
                if($binArray[$i]=="1"){
                    $dec += pow(2,$i);
                }
            }
            return $dec;
        }

        function ipBiToDec($IpBin){
            $decIp = "";
            $binaryIpArray = explode(".",$IpBin);
            foreach($binaryIpArray as $BinPart){
                $decimalPart = BinaryToDecimal($BinPart);
                $decIp.=$decimalPart.".";
            }
            $decIp = substr($decIp,0,-1);
            return $decIp;
        }
        //EtLogique entre 2 octets
        function EtLogique($IpBinOctet,$MaskBinOctet){
            $octetPostMaskBin = array(0,0,0,0,0,0,0,0);
            $ipBinArray = str_split($IpBinOctet);
            $maskBinArray = str_split($MaskBinOctet);
            $ipBinArray = array_reverse($ipBinArray);
            $maskBinArray = array_reverse($maskBinArray);
            for($i=0;$i<count($ipBinArray);$i++){
                if($ipBinArray[$i] == "1" && $maskBinArray[$i] == "1"){
                    $octetPostMaskBin[$i] = 1;
                }
                else{
                    $ipPostMaskBin[$i] = 0;
                }
            }
            return implode(array_reverse($octetPostMaskBin));
        }

        //EtLogique entre l'ip et le masque
        function ipEtLogique($ipDecimal,$maskDecimal){
            $IpPostCalcul="";
            $ipBinary = ipDecToBi($ipDecimal);
            $maskBinary = ipDecToBi($maskDecimal);
            $binaryIpArray = explode(".",$ipBinary);
            $binMaskArray = explode(".",$maskBinary);
            for($i=0;$i<count($binaryIpArray);$i++){
                $octetPostCalcul=EtLogique($binaryIpArray[$i],$binMaskArray[$i]);
                $IpPostCalcul.=$octetPostCalcul.".";
            }
            return $IpPostCalcul;
        }
       

        //inverse le masque
        function maskInv($maskBinaire){
            $i = 0;
            $maskBinaryArray = str_split($maskBinaire);
            while($i<count($maskBinaryArray)){
                if($maskBinaryArray[$i] == "1"){
                    $maskBinaryArray[$i] = "0";
                }
                elseif($maskBinaryArray[$i] == "0"){
                    $maskBinaryArray[$i] = "1";
                }
                $i++;
            }
            return implode($maskBinaryArray);
        }

        function OuLogique($firstAdrrBinaire,$maskInverséBinaire){
            $adresseDiffusion="";
            $firstAdrrBinaireArray = str_split($firstAdrrBinaire);
            $maskInverséBinaireArray = str_split($maskInverséBinaire);
            for($i=0;$i<count($firstAdrrBinaireArray);$i++){
                if($maskInverséBinaireArray[$i] == "1" or $firstAdrrBinaireArray[$i] == "1"){
                    $adresseDiffusion .+ "1";
                }
                elseif($maskInverséBinaireArray[$i] == "0" and $firstAdrrBinaireArray[$i] == "0"){
                    $adresseDiffusion .+ "0";
                }
            }
            return $adresseDiffusion;
        }

        echo "ip : ".$ipDec; 
        echo " ";
        echo ClasseIP($ipDec);

        echo "<br>";

        $octet4 = rand(0,255);
        $mask24 = "255.255.255.$octet4";
        echo "masque : ".$mask24;
        echo"<br>";

        $IpBinaire = ipDecToBi($ipDec);
        $maskbin = ipDecToBi($mask24);
        

        echo "ip en binaire : ".$IpBinaire;
        echo "<br>";
        echo "mask en binaire : ".$maskbin;

        echo "<br>";
        echo BinaryToDecimal(DectToBI($A));
        echo "<br>";
        echo "ip decimal près passage en binaire : ".ipBiToDec($IpBinaire);

        $explodemask = explode(".",$mask24);
        echo "<br>";
        echo "test etlogique entre 2 octets : ".EtLogique(DectToBi($D),DectToBi($explodemask[3]));
        echo "<br>";
        echo "version decimal : ".BinaryToDecimal(EtLogique(DectToBi($D),DectToBi($explodemask[3])));

        $postEtLogique = ipEtLogique($ipDec,$mask24);
        echo "<br>";
        echo "ip masque etlogique ?????? : ".$postEtLogique;
        echo "decimal : ".ipBiToDec($postEtLogique);

        // $iptest = "192.168.1.56";
        // $masktest = "255.255.255.240";

        // $ipFinale = ipEtLogique($iptest,$masktest);
        // echo "première addresse binaire : ".$ipFinale;
        // echo"<br>";
        // echo "première addresse decimal : ".ipBiToDec($ipFinale);
        // echo "<br>";

        // echo "<br>";
        // echo "massque inversé en binaire : ".maskInv($maskbin);
        // echo "<br>";
        // echo "massque inversé en decimal : ".ipBiToDec(maskInv($maskbin));

        // echo "<br>";
        // $diffusion = OuLogique($IpBinaire,$maskbin);
        // echo $diffusion;

    ?>
</body>
</html>