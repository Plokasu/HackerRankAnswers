//https://www.hackerrank.com/challenges/count-triplets-1/problem
// Complete the countTriplets function below.
function countTriplets($arr, $r) {
    $firstLevel = [];
    $needToComplete = [];

    $total = 0;
    for($i = 0; $i < count($arr); $i++) {
        if(isset($needToComplete[$arr[$i]])) {
            $total += $needToComplete[$arr[$i]];
        }
        
        if(isset($firstLevel[$arr[$i]/$r])) {
            if(!isset($needToComplete[$arr[$i]*$r])) {
                $needToComplete[$arr[$i]*$r] = $firstLevel[$arr[$i]/$r];
            }else{
                $needToComplete[$arr[$i]*$r] += $firstLevel[$arr[$i]/$r];
            }
        }

        if(!isset($firstLevel[$arr[$i]])) {
            $firstLevel[$arr[$i]] = 1;
        }else{
            $firstLevel[$arr[$i]]++;
        }
    }

    return $total;
}
