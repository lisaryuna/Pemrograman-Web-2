<?php
require_once '../config/Koneksi.php';

function getBuku() {
    $conn = koneksi();
    $query = "SELECT * FROM buku";
    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambahBuku($data) {
    $conn = koneksi();
    $judul = $data['judul_buku'];
    $penulis = $data['penulis'];
    $penerbit = $data['penerbit'];
    $tahun_terbit = $data['tahun_terbit'];

    $query = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) 
            VALUES ('$judul', '$penulis', '$penerbit', '$tahun_terbit')";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editBuku($data) {
    $conn = koneksi();
    $id = $data['id_buku'];
    $judul = $data['judul_buku'];
    $penulis = $data['penulis'];
    $penerbit = $data['penerbit'];
    $tahun_terbit = $data['tahun_terbit'];

    $query = "UPDATE buku SET 
            judul_buku='$judul', 
            penulis='$penulis', 
            penerbit='$penerbit', 
            tahun_terbit='$tahun_terbit' 
            WHERE id_buku=$id";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusBuku($id) {
    $conn = koneksi();

    $query = "DELETE FROM buku WHERE id_buku=$id";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function getBukuById($id) {
    $conn = koneksi();

    $query = "SELECT * FROM buku WHERE id_buku = $id";

    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function getMember() {
    $conn = koneksi();
    $query = "SELECT * FROM member";
    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambahMember($data) {
    $conn = koneksi();
    $nama = $data['nama_member'];
    $nomor = $data['nomor_member'];
    $alamat = $data['alamat'];
    $tgl_daftar = $data['tgl_mendaftar'];
    $tgl_bayar = $data['tgl_terakhir_bayar'];

    $query = "INSERT INTO member (nama_member, alamat, nomor_member, tgl_mendaftar, tgl_terakhir_bayar) 
            VALUES ('$nama', '$alamat', '$nomor', '$tgl_daftar', '$tgl_bayar')";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editMember($data) {
    $conn = koneksi();
    $id = $data['id_member'];
    $nama = $data['nama_member'];
    $nomor = $data['nomor_member'];
    $alamat = $data['alamat'];
    $tgl_daftar = $data['tgl_mendaftar'];
    $tgl_bayar = $data['tgl_terakhir_bayar'];

    $query = "UPDATE member SET 
            nama_member='$nama', 
            nomor_member='$nomor', 
            alamat='$alamat', 
            tgl_mendaftar='$tgl_daftar', 
            tgl_terakhir_bayar='$tgl_bayar' 
            WHERE id_member=$id";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusMember($id) {
    $conn = koneksi();

    $query = "DELETE FROM member WHERE id_member=$id";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function getMemberById($id) {
    $conn = koneksi();

    $query = "SELECT * FROM member WHERE id_member = $id";

    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

function getPeminjaman() {
    $conn = koneksi();
    $query = "SELECT peminjaman.*, member.nama_member, buku.judul_buku 
            FROM peminjaman 
            JOIN member ON peminjaman.id_member = member.id_member 
            JOIN buku ON peminjaman.id_buku = buku.id_buku";
    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambahPeminjaman($data) {
    $conn = koneksi();
    $id_member = $data['id_member'];
    $id_buku = $data['id_buku'];
    $tgl_pinjam = $data['tgl_pinjam'];
    $tgl_kembali = $data['tgl_kembali'];

    $query = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) 
            VALUES ('$id_member', '$id_buku', '$tgl_pinjam', '$tgl_kembali')";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editPeminjaman($data) {
    $conn = koneksi();
    $id = $data['id_peminjaman'];
    $id_member = $data['id_member'];
    $id_buku = $data['id_buku'];
    $tgl_pinjam = $data['tgl_pinjam'];
    $tgl_kembali = $data['tgl_kembali'];

    $query = "UPDATE peminjaman SET 
            id_member='$id_member', 
            id_buku='$id_buku', 
            tgl_pinjam='$tgl_pinjam', 
            tgl_kembali='$tgl_kembali' 
            WHERE id_peminjaman=$id";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapusPeminjaman($id) {
    $conn = koneksi();

    $query = "DELETE FROM peminjaman WHERE id_peminjaman=$id";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function getPeminjamanById($id) {
    $conn = koneksi();

    $query = "SELECT * FROM peminjaman WHERE id_peminjaman = $id";

    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}
?>