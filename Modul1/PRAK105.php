<?php
$smartphones = [
    "S22" => "Samsung Galaxy S22",
    "S22+" => "Samsung Galaxy S22+",
    "A03" => "Samsung Galaxy A03",
    "Xcover 5" => "Samsung Galaxy Xcover 5"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRAK105</title>
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
        .header-merah {
            background-color: red;
            padding: 25px 5px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th class="header-merah">Daftar Smartphone Samsung</th>
        </tr>
        <?php foreach($smartphones as $key => $phone): ?>
        <tr>
            <td><?= $phone ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>