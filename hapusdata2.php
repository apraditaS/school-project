<?php
include 'connect_p.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $queryhapus = "DELETE FROM tb_buku WHERE id_buku = '$id'";
    $hapusdata = $conn->query($queryhapus);

    if ($hapusdata) {
        echo "<script>alert('Data berhasil dihapus');window.location='tampildata2.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>