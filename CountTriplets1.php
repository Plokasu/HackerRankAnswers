//https://www.hackerrank.com/challenges/count-triplets-1/problem
// Complete the countTriplets function below.
function countTriplets($arr, $r) {
    $firstLevel = [];
    $complete = [];

    $total = 0;
    for($i = 0; $i < count($arr); $i++) {
        
        if(isset($complete[$arr[$i]])) {
            $total += $complete[$arr[$i]];
        }

        if(isset($firstLevel[$arr[$i]])) {
            if(!isset($complete[$arr[$i] * $r])) {
                $complete[$arr[$i] * $r] = 0;
            }
            $complete[$arr[$i] * $r] += $firstLevel[$arr[$i]];
        }

        if(!isset($firstLevel[$arr[$i] * $r])) {
            $firstLevel[$arr[$i] * $r] = 0;
        }

        $firstLevel[$arr[$i] * $r]++;
    }
    
    return $total;
}
