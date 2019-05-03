<?php
    include "db.php"; // digunakan untuk memasukkan db.php

    // if (isset($_POST['tambah'])) digunakan untuk mengecek apakah tombol tambah sudah di tekan
    if (isset($_POST['tambah'])) {
        // var_dump digunakan untuk mengecek data
        // var_dump($_POST);

        // mangambil data yang telah dikirim kemudian dimasukkan ke variabel
        // $_POST['keterangan'] dimana keterangan didapat dari attribute name pada inputan
        $keterangan = $_POST['keterangan'];
        $status     = $_POST['status'];
        $jumlah     = $_POST['jumlah'];
        $tanggal    = $_POST['tanggal'];

        // query atau perintah untuk menambahkan data ke tabel tb_transaksi
        $query = "INSERT INTO tb_transaksi VALUES ('', '$keterangan', '$status', $jumlah, '$tanggal')";

        //echo $query;
        // mysqli_query adalah perintah untuk menjalankan query
        $result = mysqli_query($conn, $query);

        // jika berhasil maka tampilkan peringatan dan redirect
        // jika gagal maka tampilkan peringatan
        if ($result) {
            // echo digunakan untuk menampilkan ke layar
            echo "
                <script>
                    // digunakan untuk membuat peringatan
                    alert('Data berhasil ditambahkan');
                    // digunakan untuk redirect atau pindah halaman
                    window.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal ditambahkan');
                </script>
            ";
        }
    }
?>

<!-- tag form digunakan untuk membuat formulir -->
<!-- attribute action digunakan untuk alamat pengiriman data, jika kosong maka data dikirim di file tersebut -->
<!-- attribute method digunakan untuk memilih metode pengirimannya (ada post & get) -->
<!-- method post adalah mengirim data tanpa terlihat di url -->
<!-- method get adalah mengirim data dengan melihatkan datanya di url -->
<form action="" method="post">

    <!-- tag table digunakan untuk membuat tabel -->
    <table>
        <!-- tag tr digunakan untuk membuat baris -->
        <tr>
            <!-- tag td digunakan untuk membuat kolom -->
            <td>Keterangan</td>
            <td>
                <!-- tag input digunakan untuk membuat inputan -->
                <!-- attribute type digunakan untuk memilih type inputan -->
                <!-- attribute name digunakan untuk menamai tag input -->
                <!-- attribue id digunakan untuk memberi identitas inputan -->
                <input type="text" name="keterangan" id="keterangan">
            </td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <!-- type radio digunakan untuk memilih salah satu opsi -->
                <!-- attribute value digunakan untuk memberi nilai pada inputan -->
                <input type="radio" name="status" id="masuk" value="masuk"> Masuk
                <input type="radio" name="status" id="keluar" value="keluar"> Keluar
            </td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td>
                <!-- type number digunakan memberi inputan yang berisi angka -->
                <input type="number" name="jumlah" id="jumlah">
            </td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>
                <!-- type date digunakan untuk memberi inputan yang berisi tanggal -->
                <input type="date" name="tanggal" id="tanggal">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <!-- tag button digunakan untuk membuat tombol -->
                <!-- type submit menjadikan tombol sebagai submit agar bisa dikirim -->
                <button type="submit" name="tambah">Tambah</button>
            </td>
        </tr>
    </table>
</form>