<?php

// Complete the activityNotifications function below.

class Node {
    function __construct($value) {
        $this->value = $value;
        $this->next = null;
    }
};

class Queue {
    protected $tail;
    public $count, $counter, $head;

    function __construct() 
    {
        $this->head = null;
        $this->tail = null;
        $this->count = 0;
        $this->counter = array_fill (0, 201 , 0);;
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
        $this->count++;
        $this->counter[$value]++;
    }

    public function pop() 
    {
        if($this->head !== null) {
            $this->counter[$this->head->value]--;
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
};

function calculateMedian($queue, $medianIndex, $isEven) 
{
    $sum = -1;
    $firstNumber = null;
    $auxCountArray = array_merge($queue->counter, []);

    for($i = 1; $i <= 200; $i++) {
        $auxCountArray[$i] += $auxCountArray[$i - 1];
    }
    
    $temp = $queue->head;
    $firstNumber = null;

    do{
        if($isEven) {
            if($auxCountArray[$temp->value] == $medianIndex) {
                $firstNumber = $temp->value;
            }else if($auxCountArray[$temp->value] == ($medianIndex + 1)) {
                return ($firstNumber + $temp->value)/2;
            }
        }else{
            if($auxCountArray[$temp->value] == $medianIndex) {
                return $temp->value;
            }
        }

        $auxCountArray[$temp->value]--;
        $temp = $temp->next;
    } while($temp != null);
}

function activityNotifications($expenditure, $d) {
    $notifications = 0;
    $queue = new Queue();
    $isEven = $d%2 === 0;

    $medianIndex = (int)($d/2) + ($isEven ? 0 : 1); 
    
    $length = count($expenditure);

    for($i = 0; $i < $length; $i++) {
        if($queue->count === $d) {
            $queue->print();
            var_dump(calculateMedian($queue, $medianIndex, $isEven));
            if($expenditure[$i] >= 2 * calculateMedian($queue, $medianIndex, $isEven)) {
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
