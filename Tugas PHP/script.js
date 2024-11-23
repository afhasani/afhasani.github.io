function validateForm() {
    // Validasi panjang teks
    let name = document.getElementById('name').value;
    if (name.length < 5) {
        alert('Nama harus lebih dari 5 karakter');
        return false;
    }

    // Validasi ukuran file
    let file = document.getElementById('file').files[0];
    if (file) {
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran file harus kurang dari 2MB');
            return false;
        }
        // Validasi tipe file
        if (file.type !== 'text/plain') {
            alert('Hanya file teks yang diizinkan');
            return false;
        }
    }

    return true;
}
