<!DOCTYPE html>
<html>

<head>
    <title>Tampil Data Transaksi</title>
    <link rel="stylesheet" href="datanggota.css">
</head>

<body>
    <table width="100%" , border="1px">
        <caption>
            Tampil Data Transaksi
            <div class="caption-action">
                <a href="tambahdata.php" class="btn-tambah">Tambah Data</a>
            </div>
        </caption>
        <tr>
            <th>No</th>
            <th>Nama Anggota</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Aksi</th>
        </tr>

        <?php

        include 'connect_p.php';
        $no = 1;
        $tampiltransaksi = $conn->query("SELECT * FROM tb_transaksi");

        while ($row = $tampiltransaksi->fetch_array()) {
            echo "<tr>
                <td>" . $no . "</td>
                <td>" . $row['nama_anggota'] . "</td>
                <td>" . $row['judul_buku'] . "</td>
                <td>" . $row['tanggal_pinjam'] . "</td>
                <td>" . $row['tanggal_kembali'] . "</td>
                <td>
                <a href='ubahdata.php?id=" . $row['id_transaksi'] . "' class='btn-ubah'> Ubah Data </a>
                <a href='hapusdata.php?id=" . $row['id_transaksi'] . "' class='btn-hapus'> Hapus Data </a>
                </td>
                </tr>";
            $no++;
        }
        ?>
    </table>

</body>

</html>