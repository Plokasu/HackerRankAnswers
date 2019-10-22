function appendAndDelete($s, $t, $k) 
{
    $sLength = strlen($s);
    $tLength = strlen($t);

    if($sLength + $tLength <= $k) {
        return "Yes";
    }    

    $n = 0;
    for($i = 0; $i < $sLength; $i++) {
        if(!isset($t[$i])) {
            break;
        }

        if($s[$i] !== $t[$i]) {
            break;
        }
        $n++;
    }

    $ops = $sLength + $tLength - 2*$n;

    if($ops <= $k && ($ops - $k) % 2 == 0) {
        return "Yes";
    }

    return "No";
}

