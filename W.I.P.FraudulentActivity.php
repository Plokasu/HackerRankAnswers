<?php

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
        $this->countingSort = [];
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
                if($currentIndex >= $this->medianIndex && $firstNumber === null) {
                    return $number * 2;
                }else if($currentIndex == $this->medianIndex - 1) {
                    $firstNumber = $number;
                }else if($currentIndex >= $this->medianIndex) {
                    return $firstNumber + $number;
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
            if($expenditure[$i] >= $queue->medianTimesTwo()) {
                $notifications++;
            }
            $queue->pop();
        }
        $queue->push($expenditure[$i]);
    }
    return $notifications;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$stdin = fopen("php://stdin", "r");

fscanf($stdin, "%[^\n]", $nd_temp);
$nd = explode(' ', $nd_temp);

$n = intval($nd[0]);

$d = intval($nd[1]);

fscanf($stdin, "%[^\n]", $expenditure_temp);

$expenditure = array_map('intval', preg_split('/ /', $expenditure_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = activityNotifications($expenditure, $d);

fwrite($fptr, $result . "\n");

fclose($stdin);
fclose($fptr);
