
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require 'hammingDistance.php';
        require 'levenShtein.php';

        $stringA = $_POST["stringA"];
        $stringB = $_POST["stringB"];

        if (isset($_POST["calculateHamming"])) {
            $hammingCalculator = new HammingDistanceCalculator($stringA, $stringB);
            $hammingCalculator->CalculateHammingDistance(); // Calculate Hamming distance
        
            // Display the result
            echo "<h2>Result:</h2>";
            echo "String A: " . $hammingCalculator->getStringA() . "<br>";
            echo "String B: " . $hammingCalculator->getStringB() . "<br>";
            echo "Hamming Distance: " . $hammingCalculator->getHammingDistance() . "<br>";
        }

        if (isset($_POST["calculateLevenshtein"])) {
            $levenshteinCalculator = new LevenshteinDistanceCalculator($stringA, $stringB);
            $levenshteinCalculator->calculateLevenshteinDistance(); // Calculate Leven distance
            $levenshteinDistance = $levenshteinCalculator->getLevenshteinDistance();
            echo "<h2>Levenshtein Distance:</h2>";
            echo "Distance: $levenshteinDistance";
        }
    }
    ?>

