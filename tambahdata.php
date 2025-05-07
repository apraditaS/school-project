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
        <p class="title">Halaman Daftar Anggota Perpustakaan</p>
        <div class="form-group">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Instansi</td>
                    <td><input type="text" name="instansi"></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td><input type="text" name="tempat_lahir"></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td><input type="date" name="tanggal_lahir"></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>
                        <input type="radio" name="kelamin" value="P"> Perempuan
                        <input type="radio" name="kelamin" value="L"> Laki-Laki
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><input type="text" name="status"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat"></td>
                </tr>
                <tr>
                    <td>No Telp</td>
                    <td><input type="text" name="notelp"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email"></td>
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
    $nama = $_POST['nama'];
    $instansi = $_POST['instansi'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $kelamin = isset($_POST['kelamin']) ? $_POST['kelamin'] : null;
    $status = $_POST['status'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];






    $email = $_POST['email'];

    $querysimpan = "INSERT INTO tb_anggota (nama, instansi, tempat_lahir, tanggal_lahir, kelamin, status, alamat, notelp, email)
                  VALUES ('$nama', '$instansi', '$tempat_lahir', '$tanggal_lahir', '$kelamin', '$status', '$alamat', '$notelp', '$email')";
    $simpandata = $conn->query($querysimpan);

    if ($simpandata) {
        echo "<script>alert('Data Berhasil disimpan');window.location='tampildata.php'</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>