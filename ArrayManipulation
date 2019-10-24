// https://www.hackerrank.com/challenges/crush/problem
// Some test cases fail, it seems to be because of Php 32 bit int size, probably.

function arrayManipulation($n, $queries) {
    $array = array_fill (1 , $n, 0);
    
    for($i = 0; $i < count($queries); $i++) {
        $array[$queries[$i][0]] += $queries[$i][2];
        if($queries[$i][1] + 1 <= count($array)) {
            $array[$queries[$i][1] + 1] -= $queries[$i][2];
        }
    }
    
    $max = 0;
    $total = 0;

    for($i = 1; $i <= count($array); $i++) {
        $total += $array[$i];
        if($total > $max) {
            $max = $total;
        }
    }

    return $max;
}
