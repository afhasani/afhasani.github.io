<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'produk_db');

function tampilkanProduk()
{
    global $koneksi;
    $query = "SELECT * FROM produk";
    $result = mysqli_query($koneksi, $query);
    $produkList = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $produkList[] = $row;
    }
    return $produkList;
}

function tambahProduk($judul, $deskripsi, $gambar, $link, $rating, $nama_pemilik, $no_telepon)
{
    global $koneksi;
    $query = "INSERT INTO produk (judul, deskripsi, gambar, link, rating, nama_pemilik, no_telepon) 
                VALUES ('$judul', '$deskripsi', '$gambar', '$link', $rating, '$nama_pemilik', '$no_telepon')";
    return mysqli_query($koneksi, $query);
}

function hapusProduk($id)
{
    global $koneksi;

    // Pertama, ambil informasi produk berdasarkan ID
    $query = "SELECT gambar FROM produk WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        // Mengambil nama gambar dari hasil query
        $row = mysqli_fetch_assoc($result);
        $gambar = $row['gambar'];
        
        // Hapus file gambar dari folder
        $filePath = "images/" . $gambar; // Pastikan path sesuai dengan lokasi file gambar
        if (file_exists($filePath)) {
            unlink($filePath); // Menghapus file gambar
        }
    }

    // Setelah menghapus gambar, hapus produk dari database
    $query = "DELETE FROM produk WHERE id = $id";
    return mysqli_query($koneksi, $query);
}


function editProduk($id, $judul, $deskripsi, $gambar, $link, $rating, $nama_pemilik, $no_telepon)
{
    global $koneksi;
    $query = "UPDATE produk 
                SET judul = '$judul', deskripsi = '$deskripsi', gambar = '$gambar', link = '$link', 
                    rating = $rating, nama_pemilik = '$nama_pemilik', no_telepon = '$no_telepon' 
                WHERE id = $id";
    return mysqli_query($koneksi, $query);
}

function getProdukById($id)
{
    global $koneksi;
    $query = "SELECT * FROM produk WHERE id = $id";
    $result = mysqli_query($koneksi, $query);
    return mysqli_fetch_assoc($result);
}
?>
