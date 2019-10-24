// https://www.hackerrank.com/challenges/ctci-array-left-rotation/problem
// Complete the rotLeft function below.
function rotLeft($a, $d) {
    $array = [];
    $arrayLength = count($a);
    for($i = 0; $i < $arrayLength; $i++) {
        $array[phpModulo($i-$d, $arrayLength)] = $a[$i];
    }
    ksort($array);
    return $array;
}

function phpModulo ($number, $modulo) {
    return (int) (($modulo + ($number % $modulo)) % $modulo);
}
