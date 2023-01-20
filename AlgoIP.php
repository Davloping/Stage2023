<?php
    function generateIP(){
        $Oct1 = rand(0,255);
        $Oct2 = rand(0,255);
        $Oct3 = rand(0,255);
        $Oct4 = rand(1,254);
        $generatedIP = "$Oct1.$Oct2.$Oct3.$Oct4";
        return $generatedIP;
    }

    function generateIpA(){
        $Oct1 = rand(0,127);
        $Oct2 = rand(0,255);
        $Oct3 = rand(0,255);
        $Oct4 = rand(1,254);
        $generatedIP = "$Oct1.$Oct2.$Oct3.$Oct4";
        return $generatedIP;
    }

    function generateIpB(){
        $Oct1 = rand(128,191);
        $Oct2 = rand(0,255);
        $Oct3 = rand(0,255);
        $Oct4 = rand(1,254);
        $generatedIP = "$Oct1.$Oct2.$Oct3.$Oct4";
        return $generatedIP;
    }

    function generateIpC(){
        $Oct1 = rand(192,223);
        $Oct2 = rand(0,255);
        $Oct3 = rand(0,255);
        $Oct4 = rand(1,254);
        $generatedIP = "$Oct1.$Oct2.$Oct3.$Oct4";
        return $generatedIP;
    }

    function generateMask24(){
        $range = array(128,192,224,240,248);
        shuffle($range);
        $octet4 = $range[0];
        $mask = "255.255.255.$octet4";
        return $mask;
    }

    function ClasseIp($ip){
        $octet = explode(".",$ip);
        if ($octet[0] > 0 && $octet[0] <= 127){
            $class = "A";
        }
        elseif($octet[0] >= 128 && $octet[0] <= 191){
            $class = "B";
        }

        elseif($octet[0] >= 192 && $octet[0] <= 223){
            $class = "C";
        }
        else{
            $class = "autre";
        }

        return $class;
    }

    function DecimalToBinary($Decimal){

        $binary = "";
        while($Decimal > 0){
            $binary = ($Decimal % 2).$binary;
            $Decimal = floor($Decimal/2);
            
        }
        return $binary;
    }

    function ipDecimalToBinary($ipDecimal){
        $ipBinary="";
        $ipArray = explode(".",$ipDecimal);
        foreach($ipArray as $octetDecimal){
            $octetBinary = DecimalToBinary($octetDecimal);
            $octetBinary = str_pad($octetBinary,8,"0",STR_PAD_LEFT);
            $ipBinary.=$octetBinary.".";
        }
        $ipBinary=substr($ipBinary,0,-1);
        return $ipBinary;

    }

    function BinaryToDecimal($binary){
        $decimal = 0;
        $binaryArray = str_split($binary);
        $binaryArray = array_reverse($binaryArray);
        for($i=0;$i<count($binaryArray);$i++){
            if($binaryArray[$i]=="1"){
                $decimal += pow(2,$i);
            }
        };
        return $decimal;
    }

    function ipBinaryToDecimal($ipBinary){
        $ipDecimal = "";
        $binaryIpArray = explode(".",$ipBinary);
        foreach($binaryIpArray as $binaryOctet){
            $decimalOctet = BinaryToDecimal($binaryOctet);
            $ipDecimal.=$decimalOctet.".";
        }
        $ipDecimal = substr($ipDecimal,0,-1);
        return $ipDecimal;
    }

    function inverseMask($maskBinary){
        $maskBinaryArray = str_split($maskBinary);
        for ($i=0; $i < count($maskBinaryArray); $i++) { 
            if($maskBinaryArray[$i] == "1"){
                $maskBinaryArray[$i] = "0";
            }
            elseif ($maskBinaryArray[$i] == "0") {
                $maskBinaryArray[$i] = "1";
            }
        }
        return implode($maskBinaryArray);
    }

    function EtLogique($ipBinary,$maskBinary){
        $result="";
        $ipBinaryArray = str_split($ipBinary);
        $maskBinaryArray = str_split($maskBinary);
        for ($i=0; $i < count($ipBinaryArray) ; $i++) { 
            if($ipBinaryArray[$i] == "1" && $maskBinaryArray[$i] == "1"){
                $result.="1";
            }
            elseif($ipBinaryArray[$i] == "0" or $maskBinaryArray[$i] == "0"){
                $result.="0";
            }
            else{
                $result.=$ipBinaryArray[$i];
            }
        }
        return $result;
    }

    function OuLogique($firstAdrrBinary,$invMaskBinary){
        $result="";
        $firstAdrrBinaryArray = str_split($firstAdrrBinary);
        $invMaskBinaryArray = str_split($invMaskBinary);
        for ($i=0; $i < count($firstAdrrBinaryArray) ; $i++) { 
            if($firstAdrrBinaryArray[$i] == "1" or $invMaskBinaryArray[$i] == "1"){
                $result.="1";
            }
            elseif ($firstAdrrBinaryArray[$i] == "0" and $invMaskBinaryArray[$i] == "0") {
                $result.="0";
            }
            else{
                $result.=$firstAdrrBinaryArray[$i];
            }
        }
        return $result;
    }
    
    $ipDecimal = generateIP();
    // echo $ipDecimal." : ".ClasseIp($ipDecimal)."<br><br>";

    $ipBinaire = ipDecimalToBinary($ipDecimal);
    // echo $ipBinaire."<br><br>";

    $masque = generateMask24();
    // echo $masque."<br><br>";

    $masqueBinaire = ipDecimalToBinary($masque);
    // echo "masque binaire : ".$masqueBinaire."<br>";

    $masqueBinaireInverse = inverseMask($masqueBinaire);
    // echo "masque binaire inversé : ".$masqueBinaireInverse."<br><br>";

    // $octet = explode(".",$ipBinaire);
    // $DecimalPostBinaire = BinaryToDecimal($octet[0]);
    // echo "premier octet decimal post binaire : ".$DecimalPostBinaire."<br><br>";

    $ipDecimal = ipBinaryToDecimal($ipBinaire);
    // echo "ip decimal après conversion binaire : ".$ipDecimal."<br><br>";

    $premiereAdresse = EtLogique($ipBinaire,$masqueBinaire);
    // echo "première addresse sous réseau : ".$premiereAdresse."<br><br>";
    $premiereAdresseDecimal = ipBinaryToDecimal($premiereAdresse);
    // echo "première adresse sous réseau décimal : ".$premiereAdresseDecimal."<br><br>";
    
    $derniereAdresse = OuLogique($premiereAdresse,$masqueBinaireInverse);
    // echo "dernière addresse sous réseau : ".$derniereAdresse."<br><br>";
    $derniereAdresseDecimal = ipBinaryToDecimal($derniereAdresse);
    // echo "dernière addresse sous réseau décimal : ".$derniereAdresseDecimal."<br><br>";
?>