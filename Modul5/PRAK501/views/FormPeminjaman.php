<?php
require_once '../models/Model.php';

$listMember = getMember();
$listBuku = getBuku();

$peminjaman = null;
$isEdit = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $peminjaman = getPeminjamanById($id);
    $isEdit = true;
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $isEdit ? 'Edit Peminjaman' : 'Tambah Peminjaman'; ?> - Perpustakaan Lisa</title>
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
        <div class="form-container">
            <h2><?= $isEdit ? 'Edit Data Peminjaman' : 'Tambah Peminjaman'; ?></h2>

            <form action="../controllers/PeminjamanController.php?action=<?= $isEdit ? 'edit' : 'tambah'; ?>" method="post">
                <?php if ($isEdit): ?>
                    <input type="hidden" name="id_peminjaman" value="<?= $peminjaman['id_peminjaman']; ?>">
                <?php endif; ?>

                <table class="form-table">
                    <tr>
                        <td>Nama Member</td>
                        <td>:</td>
                        <td>
                            <select name="id_member" required>
                                <option value="">Pilih Member</option>
                                <?php foreach ($listMember as $m) : ?>
                                    <option value="<?= $m['id_member']; ?>" <?= ($isEdit && $peminjaman['id_member'] == $m['id_member']) ? 'selected' : ''; ?>>
                                        <?= $m['nama_member']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Judul Buku</td>
                        <td>:</td>
                        <td>
                            <select name="id_buku" required>
                                <option value="">Pilih Buku</option>
                                <?php foreach ($listBuku as $b) : ?>
                                    <option value="<?= $b['id_buku']; ?>" <?= ($isEdit && $peminjaman['id_buku'] == $b['id_buku']) ? 'selected' : ''; ?>>
                                        <?= $b['judul_buku']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Pinjam</td>
                        <td>:</td>
                        <td><input type="date" name="tgl_pinjam" required value="<?= $isEdit ? $peminjaman['tgl_pinjam'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Kembali</td>
                        <td>:</td>
                        <td><input type="date" name="tgl_kembali" required value="<?= $isEdit ? $peminjaman['tgl_kembali'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <br>
                            <button type="submit" name="submit"><?= $isEdit ? 'Update' : 'Simpan'; ?></button>
                            <a href="Peminjaman.php" style="text-decoration: none;"><button type="button" class="btn-cancel">Batal</button></a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>