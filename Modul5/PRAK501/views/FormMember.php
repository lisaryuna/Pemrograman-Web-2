<?php
require_once '../models/Model.php';

$member = null;
$isEdit = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $member = getMemberById($id);
    $isEdit = true;
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $isEdit ? 'Edit Member' : 'Tambah Member'; ?> - Perpustakaan Lisa</title>
    </head>
    <body>
        <center>
            <h2><?= $isEdit ? 'Edit Data Member' : 'Tambah Member'; ?></h2>

            <form action="../controllers/MemberController.php?action=<?= $isEdit ? 'edit' : 'tambah'; ?>" method="post">
                <?php if ($isEdit): ?>
                    <input type="hidden" name="id_member" value="<?= $member['id_member']; ?>">
                <?php endif; ?>

                <table border="0" cellpadding="5">
                    <tr>
                        <td>Nama Member</td>
                        <td>:</td>
                        <td><input type="text" name="nama_member" required value="<?= $isEdit ? $member['nama_member'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td>Nomor Member</td>
                        <td>:</td>
                        <td><input type="text" name="nomor_member" required value="<?= $isEdit ? $member['nomor_member'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><textarea name="alamat" required cols="30" rows="4"><?= $isEdit ? $member['alamat'] : ''; ?></textarea></td>
                    </tr>
                    <tr>
                        <td>Tanggal Mendaftar</td>
                        <td>:</td>
                        <td>
                            <input type="datetime-local" name="tgl_mendaftar" required 
                            value="<?= $isEdit ? date('Y-m-d\TH:i', strtotime($member['tgl_mendaftar'])) : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Terakhir Bayar</td>
                        <td>:</td>
                        <td><input type="date" name="tgl_terakhir_bayar" required value="<?= $isEdit ? $member['tgl_terakhir_bayar'] : ''; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <br>
                            <button type="submit" name="submit"><?= $isEdit ? 'Update' : 'Simpan'; ?></button>
                            <a href="Member.php" style="text-decoration: none;"><button type="button">Batal</button></a>
                        </td>
                    </tr>
                </table>
            </form>
        </center>
    </body>
</html>