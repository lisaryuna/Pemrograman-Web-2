<?php
require_once '../models/Model.php';
$peminjaman = getPeminjaman();
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kelola Peminjaman - Perpustakaan Lisa</title>
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
        <div class="page-container">
            <h2>Kelola Peminjaman</h2>

            <div class="action-buttons">
                <a href="Index.php"><button>Kembali ke Beranda</button></a>
                <a href="FormPeminjaman.php"><button>Tambah Peminjaman</button></a>

            </div>

            <table>
                <tr>
                    <th>ID Peminjaman</th>
                    <th>Nama Member</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Opsi</th>
                </tr>

                <?php foreach ($peminjaman as $p) : ?>
                <tr>
                    <td><?= $p['id_peminjaman']; ?></td>
                    <td><?= $p['nama_member']; ?></td>
                    <td><?= $p['judul_buku']; ?></td>
                    <td><?= $p['tgl_pinjam']; ?></td>
                    <td><?= $p['tgl_kembali']; ?></td>
                    <td>
                        <a href="FormPeminjaman.php?id=<?= $p['id_peminjaman']; ?>">Edit</a> | 
                        <a href="../controllers/PeminjamanController.php?action=hapus&id_peminjaman=<?= $p['id_peminjaman']; ?>" onclick="return confirm('Yakin ingin menghapus data peminjaman ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>