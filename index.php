<?php
    include "db.php"; // memasukkan file db.php

    // query atau perintah untuk mengambil semua data di tabel tb_transaksi
    $query = "SELECT * FROM tb_transaksi";
    // mysqli_query adalah perintah untuk menjalankan query
    $result = mysqli_query($conn, $query);
?>

<!-- Format HTML5 -->
<!DOCTYPE html>
<html lang="en">
<!-- Bagian Kepala HTML biasanya berisi javascript dan css serta meta -->
<head>
    <title>Aplikasi Keuangan</title>
</head>
<!-- Penutup Bagian Kepala HTML -->

<!-- Body HTML yaitu bagian yang di tampilkan di browser -->
<body>
    <!-- tag a digunakan untuk pindah halaman atau redirect -->
    <a href="tambah.php">Tambah</a>

    <!-- tag table digunakan untuk membuat tabel -->
    <!-- attribute border=1 digunakan untuk menampilkan border atau garis tepi -->
    <!-- attribute cellspacing digunakan untuk mengatur jarak antar cell -->
    <!-- attribute cellpadding digunakan untuk mengatur jarak antara isi cell ke garis tepi cell -->
    <table border="1" cellspacing="0" cellpadding="10">
        <!-- tag thead digunakan untuk bagian kepala atau header -->
        <thead>
            <!-- tag th mirip seperti td bedanya th digunakan untuk header table -->
            <th>No</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </thead>

        <!-- tag tbody digunakan untuk bagian isi -->
        <tbody>
            <?php
                $no = 1; // pendeklarasian nomer
                // while adalah perulangan
                // mysqli_fetch_assoc adalah mengambil data dengan data berbentuk array asosiatif
                while ($row = mysqli_fetch_assoc($result)) :
            ?>
            <!-- tag tr digunakan untuk membuat baris -->
            <tr>
                <!-- tag td digunakan untuk membuat kolom -->
                <td><?php echo $no; // echo digunakan untuk menampilkan ke layar?></td>
                <td><?php echo $row['keterangan']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['jumlah']; ?></td>
                <td><?php echo $row['tanggal']; ?></td>
                <td>
                    <!-- BARU -->
                    <!-- meredirect halaman berdasarkan id -->
                    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                    <!-- attribute onclick adalah attribute yang jika diklik akan mengeksekusi kode -->
                    <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda Yakin Mengahpus Data <?php echo $row['keterangan']; ?>')">Hapus</a>
                    <!-- END BARU -->
                </td>
            </tr>
            <?php
                $no++; // digunakan untuk menambahkan 1
                endwhile; // tutup perulangan while
            ?>
        </tbody>
    </table>
</body>
<!-- Penutup Body HTML -->

</html>