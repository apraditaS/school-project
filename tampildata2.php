<!DOCTYPE html>
<html>

<head>
    <title>Tampil Data Buku</title>
    <link rel="stylesheet" href="datanggota.css">
</head>

<body>
    <table width="100%" , border="1px">
        <caption>
            Tampil Data Buku
            <div class="caption-action">
                <a href="tambahdata.php" class="btn-tambah">Tambah Data</a>
            </div>
        </caption>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Jumlah Halaman</th>
            <th>Stock</th>
            <th>Aksi</th>
        </tr>

        <?php

        include 'connect_p.php';
        $no = 1;
        $tampilbuku = $conn->query("SELECT * FROM tb_buku");

        while ($row = $tampilbuku->fetch_array()) {
            echo "<tr>
                <td>" . $no . "</td>
                <td>" . $row['judul'] . "</td>
                <td>" . $row['penulis'] . "</td>
                <td>" . $row['penerbit'] . "</td>
                <td>" . $row['tahun'] . "</td>
                <td>" . $row['halaman'] . "</td>
                <td>" . $row['stok'] . "</td>
                <td>
                <a href='ubahdata.php?id=" . $row['id_buku'] . "' class='btn-ubah'> Ubah Data </a>
                <a href='hapusdata.php?id=" . $row['id_buku'] . "' class='btn-hapus'> Hapus Data </a>
                </td>
                </tr>";
            $no++;
        }
        ?>
    </table>

</body>

</html>