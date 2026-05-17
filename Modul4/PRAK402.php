<!DOCTYPE html>
<html>
    <head>
        <title>PRAK402</title>
        <style>
            th {
                text-align: left;
                background-color: #d3d3d3;
            }
        </style>
    </head>
    <body>
        <?php 
        $mahasiswa = [
            ["nama" => "Andi", "nim" => "2101001", "uts" => 87, "uas" => 65],
            ["nama" => "Budi", "nim" => "2101002", "uts" => 76, "uas" => 79],
            ["nama" => "Tono", "nim" => "2101003", "uts" => 50, "uas" => 41],
            ["nama" => "Jessica", "nim" => "2101004", "uts" => 60, "uas" => 75]
        ];

        for($i = 0; $i < count($mahasiswa); $i++) {
            $nilai_akhir = ($mahasiswa[$i]["uts"] * 0.4) + ($mahasiswa[$i]["uas"] * 0.6);
            $mahasiswa[$i]["akhir"] = $nilai_akhir;

            if($nilai_akhir >= 80) {
                $huruf = "A";
            } elseif($nilai_akhir >= 70) {
                $huruf = "B";
            } elseif($nilai_akhir >= 60) {
                $huruf = "C";
            } elseif($nilai_akhir >= 50) {
                $huruf = "D";
            } else {
                $huruf = "E";
            }
            $mahasiswa[$i]["huruf"] = $huruf;
        }
        ?>

        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Akhir</th>
                <th>Huruf</th> 
            </tr>
            
            <?php foreach($mahasiswa as $row) : ?>
            <tr>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["nim"] ?></td>
                <td><?= $row["uts"] ?></td>
                <td><?= $row["uas"] ?></td>
                <td><?= $row["akhir"] ?></td>
                <td><?= $row["huruf"] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>