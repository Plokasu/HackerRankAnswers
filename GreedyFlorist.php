// https://www.hackerrank.com/challenges/greedy-florist/problem
// Complete the getMinimumCost function below.
function getMinimumCost($k, $c) {
    rsort($c);
    $currentFlowerCount = array_fill(0, $k, 0);
    $total = 0;

    for($i = 0; $i < count($c); $i += $k) {        
        for($j = 0; $j < $k; $j++) {
            if(isset($c[$i+$j])) {
                $currentFlowerCount[$j]++;
                $total += $currentFlowerCount[$j] * $c[$i+$j];
            }else{
                break;
            }
        }
    }

    return $total;
}
