<!DOCTYPE html>
<html lang="en">
<head>
    <title>Prime Numbers Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            text-align: center;
            margin: 50px;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 50%;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        td {
            color: #007bff;
            font-weight: bold;
        }
        p.error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Prime Numbers Result</h2>

<?php
// Function to check if a number is prime
function isPrime($num) {
    if ($num <= 1) return false;
    if ($num == 2) return true;
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}

// Get numbers from POST request
$n1 = isset($_POST['n1']) ? intval($_POST['n1']) : 0;
$n2 = isset($_POST['n2']) ? intval($_POST['n2']) : 0;

if ($n1 > $n2) {
    echo "<p class='error'>⚠️ Number 1 must be less than or equal to Number 2.</p>";
} else {
    echo "<h3>Prime Numbers between $n1 and $n2:</h3>";

    $foundPrimes = [];
    for ($i = $n1; $i <= $n2; $i++) {
        if (isPrime($i)) {
            $foundPrimes[] = $i;
        }
    }

    if (count($foundPrimes) > 0) {
        echo "<table><tr><th>Prime Numbers</th></tr>";
        foreach ($foundPrimes as $prime) {
            echo "<tr><td>$prime</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='error'>No prime numbers found between $n1 and $n2.</p>";
    }
}
?>

<br>
<a href="index.html">🔙 Go Back</a>

</body>
</html>
