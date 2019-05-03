<?php
    include "db.php";

    // id dapat dilihat di url itu adalah metode get
    // ?id=1 adalah name id bernilai 1
    $id = $_GET['id'];

    // query untuk menghapus data berdasarkan id
    $query = "DELETE FROM tb_transaksi WHERE id = '$id'";
    // mysqli_query digunakan untuk menjalankan query
    $result = mysqli_query($conn, $query);


    // jika berhasil maka tampilkan peringatan dan redirect
    // jika gagal maka tampilkan peringatan dan redirect
    if ($result) {
        // echo digunakan untuk menampilkan ke layar
        echo "
            <script>
                // digunakan untuk membuat peringatan
                alert('Data berhasil dihapus');
                // digunakan untuk redirect atau pindah halaman
                window.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal dihapus');
                window.location.href = 'index.php';
            </script>
        ";
    }
?>