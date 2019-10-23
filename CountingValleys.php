// Complete the countingValleys function below.
function countingValleys($n, $s) {
    $terrain = [
        'D' => -1,
        'U' => 1,
    ];

    $seaLevel = 0;
    $valleys = 0;
    
    for($i = 0; $i < strlen($s); $i++) {
        if($s[$i] == "D" && $seaLevel == 0) {
            $valleys++;
        }
        $seaLevel += $terrain[$s[$i]];
    }

    return $valleys;
}
