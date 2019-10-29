// https://www.hackerrank.com/challenges/crush/problem
// Complete the arrayManipulation function below.
function arrayManipulation($n, $queries) {
    $array = [];
    
    for($i = 0; $i < count($queries); $i++) {
        if(!isset($array[$queries[$i][0]])) {
            $array[$queries[$i][0]] = 0;
        }

        if(!isset($array[$queries[$i][1] + 1])) {
            $array[$queries[$i][1] + 1] = 0;
        }

        $array[$queries[$i][0]] += $queries[$i][2];
        $array[$queries[$i][1] + 1] -= $queries[$i][2];
    }

    ksort($array);

    $total = 0;
    $max = 0;

    foreach ($array as $value) {
        $total += $value;
        $max = max($max, $total);
    }

    return $max;
}
