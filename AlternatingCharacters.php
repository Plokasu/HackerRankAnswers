// https://www.hackerrank.com/challenges/alternating-characters/problem
// Complete the alternatingCharacters function below.
function alternatingCharacters($s) {
    if(strlen($s) <= 1 ) {
        return 0;
    }
    
    $lastChar = $s[0];
    $charCount = 0;

    for($i = 1; $i < strlen($s); $i++) {
        if($s[$i] == $lastChar) {
            $charCount++;
        }else{
            $lastChar = $s[$i];
        }
    }
    return $charCount;
}
