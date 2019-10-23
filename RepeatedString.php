// https://www.hackerrank.com/challenges/repeated-string/problem
// Complete the repeatedString function below.
function repeatedString($s, $n) {
    $stringSize = strlen($s);
    $occurrences = substr_count($s, "a");
    $timesA = $occurrences * (int) ($n/$stringSize);
    $n = $n % $stringSize;
    for($i = 0; $i < $n; $i++) {
        if($s[$i] == "a") {
            $timesA++;
        }
    }
    return $timesA;
}
