<?php

require_once __DIR__ . '/../app/Calculator.php';

$calculator = new Calculator();

echo "<h2>Calculator Demo</h2>";
echo "5 + 10 = " . $calculator->add(5, 10);

echo "<br>";
echo "5 - 10 = " . $calculator->subtract(5, 10);