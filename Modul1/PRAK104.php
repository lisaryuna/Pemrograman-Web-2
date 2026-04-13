<?php
$smartphones = ["Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover 5"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRAK104</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: separate;
            border-spacing: 2px;
        }
        th, td {
            border: 1px solid black;
            padding: 3px 5px;
            text-align: left;
        } th {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th><b>Daftar Smartphone Samsung</b></th>
        </tr>
        <?php foreach($smartphones as $phone): ?>
        <tr>
            <td><?= $phone; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>