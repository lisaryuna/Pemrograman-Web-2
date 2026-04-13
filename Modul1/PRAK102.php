<?php
$jari_jari = 4.2;
$tinggi = 5.4;
$panjang = 8.9;
$lebar = 14.7;
$sisi = 7.9;

$nim = "2410817220012";
$akhiran = substr($nim, -1);
$volume = 0;

if ($akhiran == 0 || $akhiran == 1) {
    $volume = pi() * pow($jari_jari, 2) * $tinggi;
} elseif ($akhiran == 2 || $akhiran == 3) {
    $volume = (1/3) * pi() * pow($jari_jari, 2) * $tinggi;
} elseif ($akhiran == 4 || $akhiran == 5) {
    $volume = (4/3) * pi() * pow($jari_jari, 3);
} elseif ($akhiran == 6 || $akhiran == 7) {
    $volume = (0.5 * $sisi * $tinggi) * $panjang;
} elseif ($akhiran == 8 || $akhiran == 9) {
    $volume = (1/3) * ($panjang * $lebar) * $tinggi;
}

echo number_format($volume, 3, '.', '') . " m³";
?>