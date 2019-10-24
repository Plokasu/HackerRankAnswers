// https://www.hackerrank.com/challenges/minimum-swaps-2/problem
// Complete the minimumSwaps function below.
function minimumSwaps($arr) {
    $swaps = 0;
    $minValue = min($arr);
    $i = 0;
    while($i < count($arr)){
        if($arr[$i] - $minValue !== $i) {
            $temp = $arr[$arr[$i] - $minValue];
            $arr[$arr[$i] - $minValue] = $arr[$i];
            $arr[$i] = $temp;
            $swaps++;
        }else{
            $i++;
        }
    } 
    return $swaps;
}
