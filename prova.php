<?php

$a;
$b = "";
$c = 0;
$x = 50;
$y = "PROVA";

echo 'json_encode(!isset($a))';
echo "<br>";
echo json_encode(!isset($a));
echo "<br>";
echo 'json_encode(empty($a))';
echo "<br>";
echo json_encode(empty($a));
echo "<br>";
echo "json_encode(!isset($b))";
echo "<br>";
echo json_encode(!isset($b));
echo "<br>";
echo "json_encode(empty($b))";
echo "<br>";
echo json_encode(empty($b));
echo "<br>";
echo "json_encode(empty($b) && $b != 0)";
echo "<br>";
echo json_encode(empty($b) && $b != 0);
echo "<br>";
echo "json_encode(empty($b) && $b !== 0)";
echo "<br>";
echo json_encode(empty($b) && $b !== 0);
echo "<br>";
echo "json_encode(!isset($c))";
echo "<br>";
echo json_encode(!isset($c));
echo "<br>";
echo "json_encode(empty($c))";
echo "<br>";
echo json_encode(empty($c));
echo "<br>";
echo "json_encode(empty($c) && $c != 0)";
echo "<br>";
echo json_encode(empty($c) && $c != 0);
echo "<br>";
echo "json_encode(empty($c) && $c !== 0)";
echo "<br>";
echo json_encode(empty($c) && $c !== 0);
echo "<br>";
echo "<br>";
echo "<br>";

$variabile = 0;
echo json_encode(!filter_var($variabile, FILTER_VALIDATE_INT));

// echo "<script>console.log('prova: " . json_encode(gettype($x)) . "');</script>";
// echo "<script>console.log(" . json_encode($y) . ");</script>";
