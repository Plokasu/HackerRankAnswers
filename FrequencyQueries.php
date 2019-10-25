<?php
//https://www.hackerrank.com/challenges/frequency-queries/problem
class Counter {
    private $valuesInArray = [];
    private $frecuencies = [];
    private $fptr;
    
    function __construct($fptr) {
        $this->fptr = $fptr;
    }

    public function executeQuery($command, $value) 
    {
        switch($command) {
            case 1:
                $this->addValue($value);
            break;
            case 2:
                $this->removeValue($value);
            break;
            case 3:
                $this->checkFrecuency($value);                
            break;
        }
    }

    private function valueCanBeRemoved($value) 
    {
        return $this->valueInValuesArray($value) && $this->valuesInArray[$value] > 0;
    }

    private function valueInValuesArray($value) 
    {
        return isset($this->valuesInArray[$value]);
    }

    private function addValue($value) 
    {
        if(!$this->valueInValuesArray($value)) {
            $this->valuesInArray[$value] = 0;
        }

        $this->removeFrecuency($this->valuesInArray[$value]);
        $this->valuesInArray[$value]++;
        $this->addFrecuency($this->valuesInArray[$value]);
        
    }

    private function removeValue($value) 
    {
        if($this->valueCanBeRemoved($value)) {
            $this->removeFrecuency($this->valuesInArray[$value]);
            $this->valuesInArray[$value]--;
            $this->addFrecuency($this->valuesInArray[$value]);
        }
    }

    private function addFrecuency($frecuency) 
    {
        if(!$this->frecuencyExists($frecuency)) {
            $this->frecuencies[$frecuency] = 0;
        }

        $this->frecuencies[$frecuency]++;
    }

    private function removeFrecuency($frecuency) 
    {
        if($this->frecuencyExists($frecuency)) {
            $this->frecuencies[$frecuency]--;
        }
    }

    private function frecuencyExists($frecuency) 
    {
        return isset($this->frecuencies[$frecuency]);
    }

    private function frecuencyEnabled($frecuency) 
    {
        return $this->frecuencyExists($frecuency) && $this->frecuencies[$frecuency] > 0;
    }


    private function checkFrecuency($value) 
    {
        $text = $this->frecuencyEnabled($value) ? "1": "0";
        fwrite($this->fptr, $text."\n");
    }
};

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$q = intval(trim(fgets(STDIN)));

$queries = array();

$counter = new Counter($fptr);
for ($i = 0; $i < $q; $i++) {
    $queries_temp = rtrim(fgets(STDIN));

    $queries = array_map('intval', preg_split('/ /', $queries_temp, -1, PREG_SPLIT_NO_EMPTY));
    $counter->executeQuery($queries[0], $queries[1]);
}

fclose($fptr);
