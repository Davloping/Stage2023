function OuLogique($IpSousReseauBin,$Mask){
            $octetPostSousMaskBin = array(0,0,0,0,0,0,0,0);
            $ipBinArray = str_split($IpSousReseauBin);
            $maskBinArray = str_split($Mask);
            $ipBinArray = array_reverse($ipBinArray);
            $maskBinArray = array_reverse($maskBinArray);
            for($i=0;$i<count($maskBinArray);$i++){
                if($maskBinArray[$i] == "1"){
                    $maskBinArray[$i] = "0";
                }
                elseif($maskBinArray[$i] == "0"){
                    $maskBinArray[$i] = "1";
                }
            }
            for($i=0;$i<count($octetPostSousMaskBin);$i++){
                if($ipBinArray[$i] == 1 or $maskBinArray[$i] == 1){
                    $octetPostSousMaskBin[$i] = 1;
                }
                else{
                    $ipPostMaskBin[$i] = 0;
                }
            }
            return implode(array_reverse($octetPostSousMaskBin));
        }

        function ipOuLogique($FirstIP,$maskDecimal){
            $IpPostCalcul="";
            $ipBinary = ipDecToBi($FirstIP);
            $maskBinary = ipDecToBi($maskDecimal);
            $binaryIpArray = explode(".",$ipBinary);
            $binMaskArray = explode(".",$maskBinary);
            for($i=0;$i<count($binaryIpArray);$i++){
                $octetPostCalcul=OuLogique($binaryIpArray[$i],$binMaskArray[$i]);
                $IpPostCalcul.=$octetPostCalcul.".";
            }
            return $IpPostCalcul;
        }