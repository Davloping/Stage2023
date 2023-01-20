<?php

    $A = rand(0,255);
    $B = rand(0,255);
    $C = rand(0,255);
    $D = rand(1,254);

    $ipDec = "$A.$B.$C.$D";

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

    $octet4 = rand(0,255);
    $mask24 = "255.255.255.$octet4";
    $askBinaire = ipDecToBi($mask24);

    $ipbinaire = ipDecToBi($ipDec);
    echo EtLogique($ipbinaire,$askBinaire);
    var_dump($ipbinaire);
    echo "<br>"; 
    var_dump($askBinaire);

    // echo $Trois;
    // echo "<br>";
    // echo implode($trois);
?>