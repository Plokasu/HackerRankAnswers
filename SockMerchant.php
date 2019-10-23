// https://www.hackerrank.com/challenges/sock-merchant/problem
function sockMerchant($n, $ar) {
    $sockTypeNumbers = [];
    $totalPairs = 0;

    for($i = 0; $i < count($ar); $i++) {
        if(!isset($sockTypeNumbers[$ar[$i]])) {
            $sockTypeNumbers[$ar[$i]] = 1;
        }else{
            $sockTypeNumbers[$ar[$i]]++;
        }
    }
    
    foreach ($sockTypeNumbers as $totalSockType) {
        $totalPairs += (int) ($totalSockType/2);
    }
    
    return $totalPairs;
}
