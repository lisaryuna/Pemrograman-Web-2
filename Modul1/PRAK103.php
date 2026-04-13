<?php
$celcius = 37.841;

$fahrenheit = ($celcius * 9/5) + 32;
$reamur = $celcius * (4/5);
$kelvin = $celcius + 273.15;

echo "Fahrenheit (F): " . number_format($fahrenheit, 4, '.', '') . " °F<br>";
echo "Reamur (R): " . number_format($reamur, 4, '.', '') . " °R<br>";
echo "Kelvin (K): " . number_format($kelvin, 4, '.', '') . " K<br>";
?>