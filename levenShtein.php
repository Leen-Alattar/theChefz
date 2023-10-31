<?php 
class LevenshteinDistanceCalculator {
    private $stringA;
    private $stringB;
    private $distance;

    public function __construct($a, $b) {
        $this->setStringA($a);
        $this->setStringB($b);
        $this->distance = null;
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

    public function calculateLevenshteinDistance() {
        $this->validateStrings();

        $stringALength = strlen($this->stringA);
        $stringBLength = strlen($this->stringB);

        $dp = [];

        for ($i = 0; $i <= $stringALength; $i++) {
            $dp[$i][0] = $i;
        }

        for ($j = 0; $j <= $stringBLength; $j++) {
            $dp[0][$j] = $j;
        }

        for ($i = 1; $i <= $stringALength; $i++) {
            for ($j = 1; $j <= $stringBLength; $j++) {
                $cost = ($this->stringA[$i - 1] != $this->stringB[$j - 1]) ? 1 : 0;
                $dp[$i][$j] = min(
                    $dp[$i - 1][$j] + 1,
                    $dp[$i][$j - 1] + 1,
                    $dp[$i - 1][$j - 1] + $cost
                );
            }
        }

        $this->distance = $dp[$stringALength][$stringBLength];
    }

    public function getLevenshteinDistance() {
        return $this->distance;
    }

    private function validateStrings() {
        if ($this->stringA === null || $this->stringB === null) {
            throw new InvalidArgumentException("Both input strings must be set before calculating Levenshtein distance.");
        }
    }
}

?>