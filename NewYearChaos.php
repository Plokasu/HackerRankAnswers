// https://www.hackerrank.com/challenges/new-year-chaos/problem
// Complete the minimumBribes function below.
function minimumBribes($q) {
    $numBribes = 0;
    for($i = 0 ; $i < count($q); $i++) {
        if($q[$i] - ($i + 1) > 2) {
            return "Too chaotic";
        }
        
        for($j = max(0, $q[$i] - 2); $j < $i; $j++) {
            if($q[$j] > $q[$i]) {
                $numBribes++;
            }
        }
    }

    return $numBribes;
}
