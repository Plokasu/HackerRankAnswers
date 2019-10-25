//https://www.hackerrank.com/challenges/ctci-bubble-sort/problem
// Complete the countSwaps function below.
function countSwaps($a) {
    $numberSwaps = 0;
    $n = count($a);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n - 1; $j++) {
            if ($a[$j] > $a[$j + 1]) {
                $numberSwaps++;
                list($a[$j], $a[$j + 1]) = array($a[$j + 1], $a[$j]);
            }
        }
    }
    print "Array is sorted in $numberSwaps swaps.\nFirst Element: $a[0]\nLast Element: ".$a[$n - 1];
}
