<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form Ubah Data Buku</title>
</head>

<body>

    <h1>Form Ubah Data Buku</h1>

    <?php
    include 'connect_p.php';
    $getdata = $conn->query("SELECT * FROM tb_buku WHERE id_buku='" . $_GET['id'] . "'");
    $row = $getdata->fetch_array();
    ?>

    <form method="post">
        <table>
            <tr>
                <td>ID</td>
                <td><input type="text" name="id" value="<?= $row['id_buku'] ?>" readonly></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul" value="<?= $row['judul'] ?>" required></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td><input type="text" name="penulis" value="<?= $row['penulis'] ?>" required></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td><input type="text" name="penerbit" value="<?= $row['penerbit'] ?>" required></td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td><input type="number" name="tahun" value="<?= $row['tahun'] ?>" required></td>
            </tr>
            <tr>
                <td>Jumlah Halaman</td>
                <td><input type="number" name="halaman" value="<?= $row['halaman'] ?>" required></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="number" name="stok" value="<?= $row['stok'] ?>" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="tbsimpan" value="Simpan"></td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['tbsimpan'])) {
        include 'connect_p.php';

        $id = $_POST['id'];
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tahun = $_POST['tahun'];
        $halaman = $_POST['halaman'];
        $stok = $_POST['stok'];

        $queryubah = "UPDATE tb_buku SET 
            judul='$judul', 
            penulis='$penulis', 
            penerbit='$penerbit', 
            tahun='$tahun', 
            halaman='$halaman', 
            stok='$stok' 
            WHERE id_buku='$id'";

        $simpandata = $conn->query($queryubah);

        if ($simpandata) {
            echo "<script>alert('Data buku berhasil diubah'); window.location='tampildata.php';</script>";
        } else {
            echo "Gagal mengubah data: " . $conn->error;
        }
    }
    ?>

</body>

</html>