// https://www.hackerrank.com/challenges/mark-and-toys/problem
// Complete the maximumToys function below.
function maximumToys($prices, $k) {
    $numberToys = 0;
    sort($prices);
    foreach($prices as $toyPrice) {
        if($k >= $toyPrice) {
            $k -= $toyPrice;
            $numberToys++;
        }else{
            return $numberToys;
        }
    }
}
