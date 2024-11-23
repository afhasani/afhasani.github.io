<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
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
        .form-container {
            max-width: 80%;
            margin: auto;
            background: black;
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            opacity: 0.7;
        }
        .form-control {
            background-color: #393E46 !important; /* Warna abu-abu */
            border-color: #4a515c!important;       /* Border abu-abu */
            color: white;
        }
        .form-control:focus {
            background-color: #292d33 !important; /* Abu-abu lebih gelap saat fokus */
            border-color: #007bff !important;    /* Border biru saat fokus */
            box-shadow: none !important;         /* Hilangkan efek shadow fokus */
            color: white;
        }
        .btn-primary{
            background-color: #15B392;
            border-color: #54C392;
        }
        .btn-primary:hover{
            background-color: #129487;
            border-color: #54C392;
        }
        .span{
            font-weight: bold;
            font-size: 20px;
        }
        .button{
            display: inline;
            float: right;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <span class="text-center" style="font-weight: bold; font-size: 30px;">Form Pendaftaran</span>
        <div class="text-center mt-1 button">
            <a href="result.php" class="btn btn-secondary">Pergi ke Result</a>
        </div>
        <form action="process.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name" minlength="5" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telepon</label>
                <input type="text" class="form-control" name="phone" id="phone" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" name="address" id="address" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Upload File</label>
                <input type="file" class="form-control" name="file" id="file" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Kirim</button>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
