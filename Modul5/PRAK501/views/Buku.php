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
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
        <div class="page-container">
            <h2>Kelola Buku</h2>

            <div class="action-buttons">
                <a href="Index.php"><button>Kembali ke Beranda</button></a>
                <a href="FormBuku.php"><button>Tambah Buku</button></a>
            </div>

            <table>
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
        </div>
    </body>
</html>