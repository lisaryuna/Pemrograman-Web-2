<?php
require_once '../models/Model.php';
$member = getMember();
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kelola Member - Perpustakaan Lisa</title>
    </head>
    <body>
        <center>
            <h2>Kelola Member</h2>

            <a href="Index.php">Kembali ke Beranda</a><br><br>
            <a href="FormMember.php">Tambah Member</a><br><br>

            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>ID Member</th>
                    <th>Nama Member</th>
                    <th>Nomor Member</th>
                    <th>Alamat</th>
                    <th>Tanggal Mendaftar</th>
                    <th>Tanggal Terakhir Bayar</th>
                    <th>Opsi</th>
                </tr>

                <?php foreach ($member as $m) : ?>
                <tr>
                    <td><?= $m['id_member']; ?></td>
                    <td><?= $m['nama_member']; ?></td>
                    <td><?= $m['nomor_member']; ?></td>
                    <td><?= $m['alamat']; ?></td>
                    <td><?= $m['tgl_mendaftar']; ?></td>
                    <td><?= $m['tgl_terakhir_bayar']; ?></td>
                    <td>
                        <a href="FormMember.php?id=<?= $m['id_member']; ?>">Edit</a> | 
                        <a href="../controllers/MemberController.php?action=hapus&id_member=<?= $m['id_member']; ?>" onclick="return confirm('Yakin ingin menghapus member ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </center>
    </body>
</html>