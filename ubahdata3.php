<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Peminjaman</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <?php
    include 'connect_p.php';
    $id = $_GET['id'];
    $getdata = $conn->query("SELECT * FROM tb_transaksi WHERE id_transaksi='$id'");
    $row = $getdata->fetch_array();
    ?>

    <form method="post" autocomplete="off" class="form">
        <p class="title">Ubah Data Peminjaman</p>
        <div class="form-group">
            <input type="hidden" name="id_transaksi" value="<?= $row['id_transaksi'] ?>">
            <table>
                <tr>
                    <td>Nama Anggota</td>
                    <td><input type="text" name="nama_anggota" value="<?= $row['nama_anggota'] ?>" required></td>
                </tr>
                <tr>
                    <td>Judul Buku</td>
                    <td><input type="text" name="judul_buku" value="<?= $row['judul_buku'] ?>" required></td>
                </tr>
                <tr>
                    <td>Tanggal Pinjam</td>
                    <td><input type="datetime-local" name="tanggal_pinjam"
                            value="<?= date('Y-m-d\TH:i', strtotime($row['tanggal_pinjam'])) ?>" required></td>
                </tr>
                <tr>
                    <td>Tanggal Kembali</td>
                    <td><input type="datetime-local" name="tanggal_kembali"
                            value="<?= date('Y-m-d\TH:i', strtotime($row['tanggal_kembali'])) ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="tbubah" value="Simpan Perubahan"></td>
                </tr>
            </table>
        </div>
    </form>
</body>

</html>

<?php
if (isset($_POST['tbubah'])) {
    include 'connect_p.php';

    $id = $_POST['id_transaksi'];
    $nama_anggota = $_POST['nama_anggota'];
    $judul_buku = $_POST['judul_buku'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    $queryubah = "UPDATE tb_transaksi SET
                    nama_anggota='$nama_anggota',
                    judul_buku='$judul_buku',
                    tanggal_pinjam='$tanggal_pinjam',
                    tanggal_kembali='$tanggal_kembali'
                  WHERE id_transaksi='$id'";
    $ubahdata = $conn->query($queryubah);

    if ($ubahdata) {
        echo "<script>alert('Data berhasil diubah'); window.location='tampildata3.php';</script>";
    } else {
        echo "Gagal mengubah data: " . $conn->error;
    }
}
?>