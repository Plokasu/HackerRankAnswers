// https://www.hackerrank.com/challenges/sherlock-and-anagrams/problem
// Complete the sherlockAndAnagrams function below.
function sherlockAndAnagrams($s) {
    $totalAnagrams = 0;
    $substringList = [];
    for($i = 0; $i < strlen($s); $i++) {
        $stringArray = [];
        for($j=$i; $j<strlen($s); $j++) {
            $stringArray[] = $s[$j];
            sort($stringArray);
            $string = implode("", $stringArray);
            if(!isset($substringList[$string])) {
                $substringList[$string] = 0;
            }else{
                $substringList[$string]++;
            }
        }
    }

    foreach($substringList as $number) {
        $totalAnagrams += Summation($number);
    }
    
    return $totalAnagrams;
}

function Summation($number){ 
    $sum = 0;
    for ($i = 1; $i <= $number; $i++){ 
      $sum += $i;
    } 
    return $sum; 
} 
