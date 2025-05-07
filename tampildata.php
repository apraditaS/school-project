<!DOCTYPE html>
<html>

<head>
    <title>Tampil Data Anggota</title>
    <link rel="stylesheet" href="datanggota.css">
</head>

<body>
    <table>
        <caption>
            Tampil Data Anggota
            <div class="caption-action">
                <a href="tambahdata.php" class="btn-tambah">Tambah Data</a>
            </div>
        </caption>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Instansi</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>kelamin</th>
                <th>Status</th>
                <th>Alamat</th>
                <th>No Telfon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php

        include 'connect_p.php';
        $no = 1;
        $tampilanggota = $conn->query("SELECT * FROM tb_anggota");

        while ($row = $tampilanggota->fetch_array()) {
            echo "<tr>
                <td>" . $no . "</td>
                <td>" . $row['nama'] . "</td>
                <td>" . $row['instansi'] . "</td>
                <td>" . $row['tempat_lahir'] . "</td>
                <td>" . $row['tanggal_lahir'] . "</td>
                <td>" . $row['kelamin'] . "</td>
                <td>" . $row['status'] . "</td>
                <td>" . $row['alamat'] . "</td>
                <td>" . $row['notelp'] . "</td>
                <td>" . $row['email'] . "</td>
               <td>
                <a href='ubahdata.php?id=" . $row['id_anggota'] . "' class='btn-ubah'> Ubah Data </a>
                <a href='hapusdata.php?id=" . $row['id_anggota'] . "' class='btn-hapus'> Hapus Data </a>
                </td> 
                </tr>";
            $no++;
        }
        ?>
    </table>

</body>

</html>