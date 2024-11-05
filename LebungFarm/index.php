<?php
include 'produk_db.php'; // Menghubungkan dengan database produk

// Koneksi ke database untuk slider
$conn = new mysqli("localhost", "root", "", "sliderDB");

// Cek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan daftar produk dari database
$produkList = tampilkanProduk();

// Mendapatkan daftar slider dari database
$sliderList1 = []; // untuk slider group 1
$sliderList2 = []; // untuk slider group 2

// Mengambil slider group 1
$result = $conn->query("SELECT * FROM sliders WHERE slider_group = 1");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $sliderList1[] = $row;
    }
}

// Mengambil slider group 2
$result = $conn->query("SELECT * FROM sliders WHERE slider_group = 2");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $sliderList2[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama Produk</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel {
            width: 40%;
            margin: 0 auto; /* Menempatkan slider di tengah */
        }
        .carousel-item img {
            width: 100%; /* Mengisi penuh area slider */
            height: auto; /* Menjaga rasio gambar */
        }
    </style>
</head>
<body>
<div class="container mt-5">
<div class="text-right mb-4">
        <a href="login.php" class="btn btn-secondary">Login</a>
    </div>
    <h1 class="text-center mb-4">Produk Kami</h1>
    <div class="row">
        <?php foreach ($produkList as $produk): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="images/<?php echo $produk['gambar']; ?>" class="card-img-top" alt="<?php echo $produk['judul']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $produk['judul']; ?></h5>
                        <p class="card-text"><?php echo $produk['deskripsi']; ?></p>
                        <p class="card-text">Rating: <?php echo $produk['rating']; ?> / 5</p>
                        <p class="card-text">Pemilik: <?php echo $produk['nama_pemilik']; ?></p>
                        <p class="card-text">Kontak: <?php echo $produk['no_telepon']; ?></p>
                        <a href="<?php echo $produk['link']; ?>" class="btn btn-primary" target="_blank">Lihat Produk</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Bagian Slider Group 1 -->
    <?php if (!empty($sliderList1)): ?>
        <h2 class="text-center mb-4 mt-5">Galeri Slider Group 1</h2>
        <div id="carouselGroup1" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php foreach ($sliderList1 as $index => $slider): ?>
                    <li data-target="#carouselGroup1" data-slide-to="<?php echo $index; ?>" <?php if ($index == 0) echo 'class="active"'; ?>></li>
                <?php endforeach; ?>
            </ol>
            <div class="carousel-inner">
                <?php foreach ($sliderList1 as $index => $slider): ?>
                    <div class="carousel-item <?php if ($index == 0) echo 'active'; ?>">
                        <img src="<?php echo $slider['image_url']; ?>" class="d-block w-100" alt="Slide <?php echo $index + 1; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselGroup1" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselGroup1" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    <?php else: ?>
        <p class="text-center mt-5">Tidak ada gambar slider group 1 yang tersedia.</p>
    <?php endif; ?>

    <!-- Bagian Slider Group 2 -->
    <?php if (!empty($sliderList2)): ?>
        <h2 class="text-center mb-4 mt-5">Galeri Slider Group 2</h2>
        <div id="carouselGroup2" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php foreach ($sliderList2 as $index => $slider): ?>
                    <li data-target="#carouselGroup2" data-slide-to="<?php echo $index; ?>" <?php if ($index == 0) echo 'class="active"'; ?>></li>
                <?php endforeach; ?>
            </ol>
            <div class="carousel-inner">
                <?php foreach ($sliderList2 as $index => $slider): ?>
                    <div class="carousel-item <?php if ($index == 0) echo 'active'; ?>">
                        <img src="<?php echo $slider['image_url']; ?>" class="d-block w-100" alt="Slide <?php echo $index + 1; ?>">
                    </div>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselGroup2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselGroup2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    <?php else: ?>
        <p class="text-center mt-5">Tidak ada gambar slider group 2 yang tersedia.</p>
    <?php endif; ?>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
