// https://www.hackerrank.com/challenges/two-strings/problem
// Complete the twoStrings function below.
function twoStrings($s1, $s2) {
    $letters = [];
    for($i = 0; $i < strlen($s1); $i++) {
        $letters[$s1[$i]] = true;
    }

    for($i = 0; $i < strlen($s1); $i++) {
        if(isset($letters[$s2[$i]])) {
            return "YES";
        }
    }
    return "NO";
}
