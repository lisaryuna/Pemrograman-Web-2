<?php
require_once '../models/Model.php';
$buku = getBuku();
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kelola Buku - Perpustakaan Lisa</title>
    </head>
    <body>
        <center>
            <h2>Kelola Buku</h2>

            <a href="Index.php">Kembali ke Beranda</a><br><br>
            <a href="FormBuku.php">Tambah Buku</a><br><br>

            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>ID Buku</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Opsi</th>
                </tr>

                <?php foreach ($buku as $b) : ?>
                <tr>
                    <td><?= $b['id_buku']; ?></td>
                    <td><?= $b['judul_buku']; ?></td>
                    <td><?= $b['penulis']; ?></td>
                    <td><?= $b['penerbit']; ?></td>
                    <td><?= $b['tahun_terbit']; ?></td>
                    <td>
                        <a href="FormBuku.php?id=<?= $b['id_buku']; ?>">Edit</a> | 
                        <a href="../controllers/BukuController.php?action=hapus&id_buku=<?= $b['id_buku']; ?>" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </center>
    </body>
</html>