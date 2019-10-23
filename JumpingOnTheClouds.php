// Complete the jumpingOnClouds function below.
function jumpingOnClouds($c) {
    $position = 0;
    $jumps = 0;
    
    do {
        if(isset($c[$position + 2]) && $c[$position + 2] == 0) {
            $position += 2;
        }else if(isset($c[$position + 1]) && $c[$position + 1] == 0) {
            $position++;
        }
        $jumps++;
    }while($position != count($c) - 1);

    return $jumps;
}
