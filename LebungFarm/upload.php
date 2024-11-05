<?php
include 'produk_db.php'; // Menghubungkan dengan database produk

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_FILES['gambar']); // Memeriksa informasi file
    var_dump($_POST); // Memeriksa data yang di-submit
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $link = $_POST['link'];
    $rating = $_POST['rating']; // Pastikan rating diambil dari form
    $nama_pemilik = $_POST['nama_pemilik']; // Ambil nama pemilik dari form
    $no_telepon = $_POST['no_telepon']; // Ambil nomor telepon dari form

    // Mengambil file gambar yang diupload
    $gambar = $_FILES['gambar']['name'];
    $target_dir = "images/"; // Folder untuk menyimpan gambar
    $target_file = $target_dir . basename($gambar);
    $uploadOk = 1; // Flag untuk mengontrol upload

    // Cek apakah file gambar sudah ada
    if (file_exists($target_file)) {
        echo "Maaf, file sudah ada.";
        $uploadOk = 0;
    }

    // Cek ukuran file
    if ($_FILES['gambar']['size'] > 1000000) { // Contoh batas ukuran 500KB
        echo "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Cek jenis file
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Jika semua cek berhasil, lakukan upload
    if ($uploadOk == 1) {
        // Memindahkan file gambar ke folder images
        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
            // Gambar berhasil diupload, sekarang simpan data produk ke database
            if (tambahProduk($judul, $deskripsi, $gambar, $link, $rating, $nama_pemilik, $no_telepon)) {
                echo "Produk berhasil ditambahkan.";
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengupload gambar.";
        }
    }
}
?>
