<?php
    include "db.php";

    // id dapat dilihat di url itu adalah metode get
    // ?id=1 adalah name id bernilai 1
    $id = $_GET['id'];

    // query untuk mengambil data berdasarkan id
    $q_select = "SELECT * FROM tb_transaksi WHERE id = '$id'";
    // mysqli_query digunakan untuk menjalankan query
    $result = mysqli_query($conn, $q_select);

    // digunakan untuk mengambil data berupa array asosiatif
    $row = mysqli_fetch_assoc($result);

    // if (isset($_POST['edit'])) digunakan untuk mengecek apakah tombol edit sudah di tekan
    if (isset($_POST['edit'])) {
        // var_dump digunakan untuk mengecek data
        // var_dump($_POST);

        // garis miring dua kali itu namanya komentar jadi digunakan untuk memberi dokumentasi
        // mangambil data yang telah dikirim kemudian dimasukkan ke variabel
        // $_POST['keterangan'] dimana keterangan didapat dari attribute name pada inputan
        $keterangan = $_POST['keterangan'];
        $status     = $_POST['status'];
        $jumlah     = $_POST['jumlah'];
        $tanggal    = $_POST['tanggal'];
        $id         = $_POST['id'];

        // query untuk update atau memperbarui data berdasarkan id
        $q_update = "UPDATE tb_transaksi SET
                    keterangan  = '$keterangan',
                    status      = '$status',
                    jumlah      = $jumlah,
                    tanggal     = '$tanggal'
                    WHERE id = '$id'";

        // echo $q_update;
        // mysqli_query digunakan untuk menjalankan query
        $result2 = mysqli_query($conn, $q_update);

        if ($result2) {
            // echo digunakan untuk menampilkan ke layar
            echo "
                <script>
                    // digunakan untuk membuat peringatan
                    alert('Data berhasil diedit');
                    // digunakan untuk redirect atau pindah halaman
                    window.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data gagal diedit');
                </script>
            ";
        }
    }
?>

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

                <!-- BARU -->
                <!-- attribute value digunakan untuk memberi nilai -->
                <!-- END BARU -->
                <input type="text" name="keterangan" id="keterangan" value="<?php echo $row['keterangan']; ?>">
            </td>
        </tr>
        <tr>
            <td>Status</td>
            <td>
                <!-- type radio digunakan untuk memilih salah satu opsi -->
                <!-- attribute value digunakan untuk memberi nilai pada inputan -->

                <!-- BARU -->
                <!-- attribute checked digunakan untuk menandai -->
                <!-- echo ($row['status'] == 'masuk') ? 'checked' : '' ?> -->
                <!-- kode diatas dapat dibaca jika isi status sama dengan masuk maka dipilih -->
                <!-- END BARU -->
                <input type="radio" name="status" id="masuk" value="masuk" <?php echo ($row['status'] == 'masuk') ? 'checked' : '' ?>> Masuk
                <input type="radio" name="status" id="keluar" value="keluar" <?php echo ($row['status'] == 'keluar') ? 'checked' : '' ?>> Keluar
            </td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td>
                <!-- type number digunakan memberi inputan yang berisi angka -->

                <!-- BARU -->
                <!-- attribute value digunakan untuk memberi nilai -->
                <!-- END BARU -->
                <input type="number" name="jumlah" id="jumlah" value="<?php echo $row['jumlah']; ?>">
            </td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>
                <!-- type date digunakan untuk memberi inputan yang berisi tanggal -->

                <!-- BARU -->
                <!-- attribute value digunakan untuk memberi nilai -->
                <!-- END BARU -->
                <input type="date" name="tanggal" id="tanggal" value="<?php echo $row['tanggal']; ?>">
            </td>
        </tr>
        <tr>
            <td>
                <!-- BARU -->
                <!-- attribute type hidden digunakan untuk membuat inputan tidak kelihatan -->
                <!-- END BARU -->
                <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
            </td>
            <td>
                <!-- tag button digunakan untuk membuat tombol -->
                <!-- type submit menjadikan tombol sebagai submit agar bisa dikirim -->
                <button type="submit" name="edit">Edit</button>
            </td>
        </tr>
    </table>
</form>