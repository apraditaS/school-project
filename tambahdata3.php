<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <form method="post" autocomplete="off" class="form">
        <p class="title">Halaman Peminjaman</p>
        <div class="form-group">
            <table>
                <tr>
                    <td>Nama Anggota</td>
                    <td><input type="text" name="nama_anggota"></td>
                </tr>
                <tr>
                    <td>Judul Buku</td>
                    <td><input type="text" name="judul_buku"></td>
                </tr>
                <tr>
                    <td>Tanggal Pinjam</td>
                    <td><input type="datetime-local" name="tanggal_pinjam"></td>
                </tr>
                <tr>
                    <td>Tanggal Kembali</td>
                    <td><input type="datetime-local" name="tanggal_kembali"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="tbsimpan" value="Simpan"></td>
                </tr>
            </table>
        </div>
    </form>
</body>

</html>

<?php
include 'connect_p.php';

if (isset($_POST['tbsimpan'])) {
    $nama_anggota = $_POST['nama_anggota'];
    $judul_buku = $_POST['judul_buku'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];


    $querysimpan = "INSERT INTO tb_transaksi (nama_anggota, judul_buku, tanggal_pinjam, tanggal_kembali)
                  VALUES ('$nama_anggota', '$judul_buku', '$tanggal_pinjam', '$tanggal_kembali')";
    $simpandata = $conn->query($querysimpan);

    if ($simpandata) {
        echo "<script>alert('Data Berhasil disimpan');window.location='tampildata3.php'</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>