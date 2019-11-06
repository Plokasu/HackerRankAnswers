// https://www.hackerrank.com/challenges/minimum-absolute-difference-in-an-array/problem
// Complete the minimumAbsoluteDifference function below.
function minimumAbsoluteDifference($arr) {
    sort($arr);
    $min = PHP_INT_MAX;
    for($i = 1; $i < count($arr); $i++) {
        $n = abs($arr[$i - 1] - $arr[$i]);
        if($n < $min) {
            $min = $n;
        }
    }

    return $min;
}
