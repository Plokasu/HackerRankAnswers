// https://www.hackerrank.com/challenges/special-palindrome-again/problem
// Complete the substrCount function below.
function substrCount($n, $s) {
    $len = strlen($s);
    $special = 0;
    for($i = 0; $i< $len; $i++) {
        $special++;
        $numberOfChars = 1;
        $middle = false;
        for($j = $i+1; $j < $len; $j++) {
            if($s[$j] == $s[$i]) {
                if($middle) {
                    $numberOfChars--;
                }else{
                    $special++;
                    $numberOfChars++;
                }

                if($numberOfChars == 0) {
                    $special++;
                    break;
                }
            }else if($middle) {
                break;
            }else{
                $middle = true;
            }
        }
    }
    return $special;
}
