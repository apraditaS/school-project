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
        <p class="title">Halaman Daftar Buku</p>
        <div class="form-group">
            <table>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judul"></td>
                </tr>
                <tr>
                    <td>Penulis</td>
                    <td><input type="text" name="penulis"></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td><input type="text" name="penerbit"></td>
                </tr>
                <tr>
                    <td>Tahun Terbit</td>
                    <td><input type="text" name="tahun"></td>
                </tr>
                <tr>
                    <td>Jumlah Halaman</td>
                    <td>
                        <input type="text" name="halaman">
                    </td>
                </tr>
                <tr>
                    <td>Stock</td>
                    <td><input type="text" name="stok"></td>
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
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $halaman = $_POST['halaman'];
    $stock = $_POST['stock'];


    $querysimpan = "INSERT INTO tb_buku (judul, penulis, penerbit, tahun, halaman, stok)
                  VALUES ('$judul', '$penulis', '$penerbit', '$tahun', '$halaman', '$stok')";
    $simpandata = $conn->query($querysimpan);

    if ($simpandata) {
        echo "<script>alert('Data Berhasil disimpan');window.location='tampildata2.php'</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>