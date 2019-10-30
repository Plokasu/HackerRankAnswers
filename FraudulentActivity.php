// https://www.hackerrank.com/challenges/fraudulent-activity-notifications/problem
// Complete the activityNotifications function below.

class Node {
    function __construct($value) {
        $this->value = $value;
        $this->next = null;
    }
};

class MedianQueue {
    protected $tail, $medianIndex, $isEven;
    public $count, $countingSort, $head;

    function __construct($d) 
    {
        $this->medianIndex = (int) ($d / 2);
        $this->isEven = $d % 2 === 0;
        $this->head = null;
        $this->tail = null;
        $this->count = 0;
        $this->countingSort = array_fill(0, 201, 0);
    }

    public function push($value) 
    {
        $node = new Node($value);

        if($this->head === null) {
            $this->head = $node;
            $this->tail = $node;
        }else{
            $this->tail->next = $node;
            $this->tail = $node;
        }

        if(!isset($this->countingSort[$value])) {
            $this->countingSort[$value] = 0;
        }

        $this->countingSort[$value]++;
        $this->count++;
    }

    public function pop() 
    {
        if($this->head !== null) {
            $this->countingSort[$this->head->value]--;
            $this->head = $this->head->next;
            $this->count--;   
        }
    }

    public function print() 
    {
        $temp = $this->head;
        do {
            echo $temp->value." ";
            $temp = $temp->next;
        }while($temp !== null);
        echo "\n";
    }

    public function medianTimesTwo() 
    {
        $currentIndex = -1;
        $firstNumber = null;

        foreach($this->countingSort as $number => $frequency) {
            $currentIndex += $frequency;
            if($this->isEven) {
                if($currentIndex >= $this->medianIndex) {
                    if($firstNumber === null) {
                        return $number * 2;
                    } else {
                        return $firstNumber + $number;
                    }
                } else if($currentIndex == $this->medianIndex - 1 && $firstNumber === null) {
                    $firstNumber = $number;
                }
            } else {
                if($currentIndex >= $this->medianIndex) {
                    return $number * 2;
                }
            }
        }
        
    }
};



function activityNotifications($expenditure, $d) {
    $notifications = 0;
    $queue = new MedianQueue($d);
    $length = count($expenditure);

    for($i = 0; $i < $length; $i++) {
        if($queue->count === $d) {
            $median = $queue->medianTimesTwo();
            var_dump($expenditure[$i]." >= ".$median);
            if($expenditure[$i] >= $median) {
                $notifications++;
            }
            $queue->pop();
        }
        $queue->push($expenditure[$i]);
    }
    return $notifications;
}
