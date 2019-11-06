// https://www.hackerrank.com/challenges/luck-balance/problem
// Complete the luckBalance function below.
function luckBalance($k, $contests) {
    $importantContests = [];
    $totalLuck = 0;
    for($i = 0; $i < count($contests); $i++) {
        if($contests[$i][1] == 1) {
            $importantContests[] = $contests[$i][0];
        }else{
            $totalLuck += $contests[$i][0];
        }
    }

    rsort($importantContests);

    for($i = 0; $i < count($importantContests); $i++) {
        if($i < $k) {
            $totalLuck += $importantContests[$i];
        }else{
            $totalLuck -= $importantContests[$i];
        }
    }

    return $totalLuck;
}
