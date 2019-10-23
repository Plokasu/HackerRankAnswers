// https://www.hackerrank.com/challenges/jumping-on-the-clouds/problem
// Complete the jumpingOnClouds function below.
function jumpingOnClouds($c) {
    $position = 0;
    $jumps = 0;
    
    do {
        $position++;
        if(isset($c[$position + 1]) && $c[$position + 1] == 0) {
            $position++;
        }
        $jumps++;
    }while($position != count($c) - 1);

    return $jumps;
}
