<?php
session_start();
if (!isset($_SESSION['formData'])) {
    die('Data tidak ditemukan.');
}

$formData = $_SESSION['formData'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #4158D0;
            background-image: -webkit-linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            background-image: -moz-linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            background-image: -o-linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
            padding: 20px;
        }
        .result-container {
            max-width: 80%;
            margin: auto;
            background: black;
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            opacity: 0.7;
        }
        .btn-secondary{
            background-color: #15B392;
            border-color: #54C392;
        }
        .btn-secondary:hover{
            background-color: #129487;
            border-color: #54C392;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #f2f2f2; /* Background abu-abu terang untuk tabel */
        }

        /* Warna background baris ketika di hover */
        table tr:hover {
            background-color: #e0e0e0; /* Background abu-abu lebih gelap saat hover */
        }

        /* Gaya untuk sel tabel */
        table td, table th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        /* Gaya untuk header tabel */
        table th {
            background-color: #d0d0d0; /* Warna abu-abu sedikit lebih gelap untuk header */
            color: #333;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h1 class="text-center">Hasil Pendaftaran</h1>
        
        <h2>Data Pengguna</h2>
        <table class="table table-striped">
            <tr><th>Field</th><th>Value</th></tr>
            <tr><td>Nama Lengkap</td><td><?= htmlspecialchars($formData['name']) ?></td></tr>
            <tr><td>Email</td><td><?= htmlspecialchars($formData['email']) ?></td></tr>
            <tr><td>Telepon</td><td><?= htmlspecialchars($formData['phone']) ?></td></tr>
            <tr><td>Alamat</td><td><?= htmlspecialchars($formData['address']) ?></td></tr>
            <tr><td>Isi File</td><td><?= nl2br(htmlspecialchars($formData['fileContent'])) ?></td></tr>
            <tr><td>User Agent</td><td><?= htmlspecialchars($formData['userAgent']) ?></td></tr>
        </table>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-secondary">Kembali ke Form</a>
        </div>
    </div>
</body>
</html>
