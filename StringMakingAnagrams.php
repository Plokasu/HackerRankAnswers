# https://www.hackerrank.com/challenges/ctci-making-anagrams/problem
// Complete the makeAnagram function below.
function makeAnagram($a, $b) 
{
    $count = [];

    for($i = 0; $i<strlen($a); $i++) {
        if(!isset($count[$a[$i]])) {
            $count[$a[$i]] = 0;
        }
        $count[$a[$i]]++;
    }

    for($i = 0; $i<strlen($b); $i++) {
        if(!isset($count[$b[$i]])) {
            $count[$b[$i]] = 0;
        }
        $count[$b[$i]]--;
    }    

    $total = 0;
    foreach($count as $value) {
        $total += abs($value);
    }
    
    return $total;
}
