<?php
require_once '../models/Model.php';

$buku = null;
$isEdit = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $buku = getBukuById($id);
    $isEdit = true;
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $isEdit ? 'Edit Buku' : 'Tambah Buku'; ?> - Perpustakaan Lisa</title>
    </head>
    <body>
        <center>
            <h2><?= $isEdit ? 'Edit Data Buku' : 'Tambah Buku'; ?></h2>

            <form action="../controllers/BukuController.php?action=<?= $isEdit ? 'edit' : 'tambah'; ?>" method="post">
                
                <?php if ($isEdit): ?>
                    <input type="hidden" name="id_buku" value="<?= $buku['id_buku']; ?>">
                <?php endif; ?>

                <table border="0" cellpadding="5">
                    <tr>
                        <td>Judul Buku</td>
                        <td>:</td>
                        <td><input type="text" name="judul_buku" required value="<?= $isEdit ? $buku['judul_buku'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td>Penulis</td>
                        <td>:</td>
                        <td><input type="text" name="penulis" required value="<?= $isEdit ? $buku['penulis'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td>Penerbit</td>
                        <td>:</td>
                        <td><input type="text" name="penerbit" required value="<?= $isEdit ? $buku['penerbit'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td>Tahun Terbit</td>
                        <td>:</td>
                        <td><input type="number" name="tahun_terbit" required value="<?= $isEdit ? $buku['tahun_terbit'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <br>
                            <button type="submit" name="submit"><?= $isEdit ? 'Update' : 'Simpan'; ?></button>
                            <a href="Buku.php" style="text-decoration: none;"><button type="button">Batal</button></a>
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>