<?php
include 'connect_p.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $queryhapus = "DELETE FROM tb_anggota WHERE id_anggota = '$id'";
    $hapusdata = $conn->query($queryhapus);

    if ($hapusdata) {
        echo "<script>alert('Data berhasil dihapus');window.location='tampildata.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>