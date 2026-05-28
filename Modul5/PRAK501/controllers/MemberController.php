<?php
require_once '../models/Model.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'tambah':
        if (tambahMember($_POST) > 0) {
            echo "<script>
                    alert('Data member berhasil ditambahkan!');
                    window.location.href = '../views/Member.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data member gagal ditambahkan!');
                    window.location.href = '../views/Member.php';
                </script>";
        }
        break;

    case 'edit':
        if (editMember($_POST) > 0) {
            echo "<script>
                    alert('Data member berhasil diubah!');
                    window.location.href = '../views/Member.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data member gagal diubah!');
                    window.location.href = '../views/Member.php';
                </script>";
        }
        break;

    case 'hapus':
        $id = $_GET['id_member'];
        if (hapusMember($id) > 0) {
            echo "<script>
                    alert('Data member berhasil dihapus!');
                    window.location.href = '../views/Member.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data member gagal dihapus!');
                    window.location.href = '../views/Member.php';
                </script>";
        }
        break;
        
    default:
        header("Location: ../views/Member.php");
        break;
}
?>