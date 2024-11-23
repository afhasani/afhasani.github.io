<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Validasi file
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileName = $_FILES['file']['name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];

        $allowedExtensions = ['txt'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            die('Format file tidak valid.');
        }

        if ($fileSize > 2 * 1024 * 1024) { // Maksimal 2 MB
            die('Ukuran file terlalu besar.');
        }

        $fileContent = file_get_contents($fileTmpPath);

        // Simpan data ke sesi
        $_SESSION['formData'] = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'fileContent' => $fileContent,
            'userAgent' => $_SERVER['HTTP_USER_AGENT'],
        ];

        // Redirect ke halaman hasil
        header('Location: result.php');
        exit();
    } else {
        die('File tidak valid atau belum diunggah.');
    }
}
