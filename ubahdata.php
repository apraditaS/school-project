<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Form Ubah Data
    </title>
</head>

<body>
    <?php
    include 'connect_p.php';
    $getdata = $conn->query("SELECT * FROM tb_anggota WHERE id_anggota='" . $_GET['id'] . "'");
    $row = $getdata->fetch_array();
    ?>
    <form method="post">
        <table>
            <tr>
                <td>ID</td>
                <td><input type="text" name="id" value="<?= $row['id_anggota'] ?>" readonly></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="<?= $row['nama'] ?>" required></td>
            </tr>
            <tr>
                <td>Instansi</td>
                <td><input type="text" name="instansi" value="<?= $row['instansi'] ?>" required></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td><input type="text" name="tempat_lahir" value="<?= $row['tempat_lahir'] ?>" required></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><input type="datetime" name="tanggal_lahir" value="<?= $row['tanggal_lahir'] ?>" required>
                </td>
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
    </form>
</body>

</html>
<?php
if (isset($_POST['tbsimpan'])) {
    include 'connect_p.php';

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $instansi = $_POST['instansi'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $kelamin = $_POST['kelamin'];
    $status = $_POST['status'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];
    $email = $_POST['email'];

    $queryubah = "UPDATE tb_anggota SET 
        nama='$nama', 
        instansi='$instansi', 
        tempat_lahir='$tempat_lahir', 
        tanggal_lahir='$tanggal_lahir', 
        kelamin='$kelamin', 
        status='$status', 
        alamat='$alamat', 
        notelp='$notelp', 
        email='$email' 
        WHERE id_anggota='$id'";

    $simpandata = $conn->query($queryubah);

    if ($simpandata) {
        echo "<script>alert('Data berhasil diubah'); window.location='tampildata.php';</script>";
    } else {
        echo "Gagal mengubah data: " . $conn->error;
    }
}
?>