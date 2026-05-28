<?php
require_once '../models/Model.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'tambah':
        if (tambahBuku($_POST) > 0) {
            echo "<script>
                    alert('Data buku berhasil ditambahkan!');
                    window.location.href = '../views/Buku.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data buku gagal ditambahkan!');
                    window.location.href = '../views/Buku.php';
                </script>";
        }
        break;

    case 'edit':
        if (editBuku($_POST) > 0) {
            echo "<script>
                    alert('Data buku berhasil diubah!');
                    window.location.href = '../views/Buku.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data buku gagal diubah!');
                    window.location.href = '../views/Buku.php';
                </script>";
        }
        break;

    case 'hapus':
        $id = $_GET['id_buku'];
        if (hapusBuku($id) > 0) {
            echo "<script>
                    alert('Data buku berhasil dihapus!');
                    window.location.href = '../views/Buku.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data buku gagal dihapus!');
                    window.location.href = '../views/Buku.php';
                </script>";
        }
        break;
        
    default:
        header("Location: ../views/Buku.php");
        break;
}
?>