// https://www.hackerrank.com/challenges/common-child
// Complete the commonChild function below.
function commonChild($s1, $s2) {
    $lcs = [];
    for($j = 0; $j < strlen($s2); $j++) {
        $prevJ = 0;
        $lcs[$j] = [];
        for($i = 0; $i < strlen($s1); $i++) {
            $prevI = 0;
            if($s1[$i] == $s2[$j]) {
                if(!isset($lcs[$j-1][$i - 1])) {
                    $n = 1;
                }else{
                    $n = $lcs[$j-1][$i - 1] + 1;
                }
            }else{
                if(isset($lcs[$j - 1][$i])) {
                    $prevJ = $lcs[$j - 1][$i];
                }
                if(isset($lcs[$j][$i - 1 ])) {
                    $prevI = $lcs[$j][$i - 1];
                }
                $n = max($prevJ, $prevI);
            }
            
            $lcs[$j][$i] = $n;

            if($j > 2) { //Memory consumed was too large, and we only really need the current and last row.
                unset($lcs[$j-2]);
            }
        }        
    }

    return $lcs[strlen($s2) - 1][strlen($s1) - 1];
}
