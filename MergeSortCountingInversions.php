# https://www.hackerrank.com/challenges/ctci-merge-sort/problem
class mergeSort {
    public $inversions;

    public function __construct() {
        $this->inversions = 0;
    }

    public function sort($arr) 
    {
        $n = count($arr);

        if($n <= 1) {
            return $arr;
        }
        
        $firstHalf = $this->sort(array_slice($arr, 0, $n / 2));
        $secondHalf = $this->sort(array_slice($arr, $n / 2));
        
        $i = 0;
        $j = 0;

        $newArr = [];

        while($i < count($firstHalf) && $j < count($secondHalf)) {
            if($firstHalf[$i] <= $secondHalf[$j]) {
                $newArr[] = $firstHalf[$i];
                $i++;
            }else{
                $newArr[] = $secondHalf[$j];
                $j++;   
                $this->inversions += (int)($n / 2) - $i;
            }
        }

        if($i < count($firstHalf)) {
            for($j = $i; $j < count($firstHalf); $j++) {
                $newArr[] = $firstHalf[$j];
            }
        }else if($j < count($secondHalf)) {
            for($i = $j; $i < count($secondHalf); $i++) {
                $newArr[] = $secondHalf[$i];
            }
        }

        return $newArr;
    }
}


// Complete the countInversions function below.
function countInversions($arr) {
    $sort = new MergeSort();
    $sort->sort($arr);
    return $sort->inversions;
}
