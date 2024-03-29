// https://www.hackerrank.com/challenges/2d-array/problem
// Complete the hourglassSum function below.
function hourglassSum($arr) {
    $maxHourglass = -63;
    for($j = 1; $j < 5; $j++) {
        for($i = 1; $i < 5; $i++) {
            $sum = $arr[$j][$i];
            for($k = $i - 1; $k <= $i + 1; $k++) {
                $sum += $arr[$j-1][$k] + $arr[$j+1][$k];
            }

            if($sum > $maxHourglass) {
                $maxHourglass = $sum;
            }
        }
    }
    return $maxHourglass;
}
