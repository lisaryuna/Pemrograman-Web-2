<?php
require_once '../models/Model.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'tambah':
        if (tambahPeminjaman($_POST) > 0) {
            echo "<script>
                    alert('Data peminjaman berhasil ditambahkan!');
                    window.location.href = '../views/Peminjaman.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data peminjaman gagal ditambahkan!');
                    window.location.href = '../views/Peminjaman.php';
                </script>";
        }
        break;

    case 'edit':
        if (editPeminjaman($_POST) > 0) {
            echo "<script>
                    alert('Data peminjaman berhasil diubah!');
                    window.location.href = '../views/Peminjaman.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data peminjaman gagal diubah!');
                    window.location.href = '../views/Peminjaman.php';
                </script>";
        }
        break;

    case 'hapus':
        $id = $_GET['id_peminjaman'];
        if (hapusPeminjaman($id) > 0) {
            echo "<script>
                    alert('Data peminjaman berhasil dihapus!');
                    window.location.href = '../views/Peminjaman.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data peminjaman gagal dihapus!');
                    window.location.href = '../views/Peminjaman.php';
                </script>";
        }
        break;
        
    default:
        header("Location: ../views/Peminjaman.php");
        break;
}
?>