<!DOCTYPE html>
<html>
    <head>
        <title>PRAK403</title>
    </head>
    <body>
        <?php 
        $data = [
            [
                "no" => 1,
                "nama" => "Ridho",
                "matkul" => [
                    ["nama_mk" => "Pemrograman I", "sks" => 2],
                    ["nama_mk" => "Praktikum Pemrograman I", "sks" => 1],
                    ["nama_mk" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
                    ["nama_mk" => "Arsitektur Komputer", "sks" => 3]
                ]
            ],
            [
                "no" => 2,
                "nama" => "Ratna",
                "matkul" => [
                    ["nama_mk" => "Basis Data I", "sks" => 2],
                    ["nama_mk" => "Praktikum Basis Data I", "sks" => 1],
                    ["nama_mk" => "Kalkulus", "sks" => 3]
                ]
            ],
            [
                "no" => 3,
                "nama" => "Tono",
                "matkul" => [
                    ["nama_mk" => "Rekayasa Perangkat Lunak", "sks" => 3],
                    ["nama_mk" => "Analisis dan Perancangan Sistem", "sks" => 3],
                    ["nama_mk" => "Komputasi Awan", "sks" => 3],
                    ["nama_mk" => "Kecerdasan Buatan", "sks" => 3]
                ]
            ]
        ];

        for($i = 0; $i < count($data); $i++) {
            $total_sks = 0;
            foreach($data[$i]["matkul"] as $matkul) {
                $total_sks += $matkul["sks"];
            }
            $data[$i]["total_sks"] = $total_sks;

            if($total_sks < 7) {
                $data[$i]["keterangan"] = "Revisi KRS";
            } else {
                $data[$i]["keterangan"] = "Tidak Revisi";
            }
        }
        ?>

        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Mata Kuliah diambil</th>
                <th>SKS</th>
                <th>Total SKS</th>
                <th>Keterangan</th>
            </tr>
            <?php foreach($data as $row) : ?>
                <?php $jumlah_matkul = count($row["matkul"]); ?>
                <tr>
                    <td rowspan="<?= $jumlah_matkul ?>"><?= $row["no"] ?></td>
                    <td rowspan="<?= $jumlah_matkul ?>"><?= $row["nama"] ?></td>

                    <td><?= $row["matkul"][0]["nama_mk"] ?></td>
                    <td><?= $row["matkul"][0]["sks"] ?></td>

                    <td rowspan="<?= $jumlah_matkul ?>"><?= $row["total_sks"] ?></td>
                    <?php 
                    $bg_color = ($row["keterangan"] == "Revisi KRS") ? "red" : "green";
                    ?>
                    <td rowspan="<?= $jumlah_matkul ?>" style="background-color: <?= $bg_color ?>; color: white;">
                        <?= $row["keterangan"] ?>
                    </td>
                </tr>

                <?php for ($j = 1; $j < $jumlah_matkul; $j++) : ?>
                    <tr>
                        <td><?= $row["matkul"][$j]["nama_mk"] ?></td>
                        <td><?= $row["matkul"][$j]["sks"] ?></td>
                    </tr>
                <?php endfor; ?>
            <?php endforeach; ?>
        </table>
    </body>
</html>