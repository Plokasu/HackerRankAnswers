// https://www.hackerrank.com/challenges/sherlock-and-valid-string/problem
// Complete the isValid function below.
function isValid($s) {
    $keys = array_count_values(preg_split('//u', $s,-1, PREG_SPLIT_NO_EMPTY));
    $frequencyCount = [];

    foreach($keys as $letter => $frequency) {
        if(!isset($frequencyCount[$frequency])) {
            $frequencyCount[$frequency] = 0;
        }
        $frequencyCount[$frequency]++;
    }

   $length = count($frequencyCount);

   if($length <= 1) {
       return "YES";
   }else if ($length > 2) {
       return "NO";
   }

   $keys = array_keys($frequencyCount);

   if(
       (($keys[1] == $keys[0] -1 || $keys[0] == 1) &&  $frequencyCount[$keys[0]] == 1) ||
       (($keys[0] == $keys[1] -1 || $keys[1] == 1) &&  $frequencyCount[$keys[1]] == 1)
     ) {
       return "YES";
   }
   return "NO";
}
