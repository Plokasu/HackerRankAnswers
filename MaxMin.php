// https://www.hackerrank.com/challenges/angry-children/problem
// Complete the maxMin function below.
function maxMin($k, $arr) {
    $unfair = PHP_INT_MAX;
    sort($arr);

    for($i = 0; $i < count($arr) - $k + 1;$i++) {
        $dif = $arr[$i + $k - 1] - $arr[$i];
        if($unfair > $dif) {
            $unfair = $dif;
        }
    }

    return $unfair;
}
