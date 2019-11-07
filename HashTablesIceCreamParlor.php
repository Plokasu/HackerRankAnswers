// https://www.hackerrank.com/challenges/ctci-ice-cream-parlor/problem
// Complete the whatFlavors function below.
function whatFlavors($cost, $money) {
    $complementCost = [];
    for($i = 0; $i < count($cost); $i++) {
        $rest = $money - $cost[$i];

        if(isset($complementCost[$cost[$i]])) {
            echo $complementCost[$cost[$i]]." ".($i+1)."\n";
            return;
        }
        
        $complementCost[$rest] = $i + 1;
    }

}
