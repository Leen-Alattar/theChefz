<?php 
class HammingDistanceCalculator {
    private $stringA;
    private $stringB;
    private $distance;

    public function __construct($a, $b) {
        $this->setStringA($a);
        $this->setStringB($b);
        $this->distance = 0;
    }

    public function setStringA($a) {
        $this->stringA = $a;
    }

    public function setStringB($b) {
        $this->stringB = $b;
    }

    public function getStringA() {
        return $this->stringA;
    }

    public function getStringB() {
        return $this->stringB;
    }

    public function calculateHammingDistance() {
        $this->validateLength();
        // Iterate through the characters in both strings
        for ($i = 0; $i < strlen($this->stringA); $i++) {
            if ($this->stringA[$i] !== $this->stringB[$i]) {
                $this->distance++; // Increment distance
            }
        }
    }
    public function getHammingDistance() {
        return $this->distance;
    }

    private function validateLength() {
        if (strlen($this->stringA) !== strlen($this->stringB)) {
            throw new InvalidArgumentException("Input strings must have the same length.");
        }
    }
}
?>
