// https://www.hackerrank.com/challenges/reverse-shuffle-merge/problem
// Complete the reverseShuffleMerge function below.
function reverseShuffleMerge($s) {
    $echo = true;
    $arr = count_chars ($s, 1);
    $aCharsCount = [];
    
    foreach($arr as $characterByte => $value) {
        $aCharsCount[chr($characterByte)] = $value/2;
    }

    $s = strrev($s);

    $aLength = strlen($s)/2;
    $minStr = "";
    
    return $minStr;
}
