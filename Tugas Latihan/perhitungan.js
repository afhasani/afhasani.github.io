// Deklarasi konstanta bobot penilaian
const bobotTugas = 0.3;
const bobotUTS = 0.3;
const bobotUAS = 0.4;
// Deklarasi tombol hitung dengan mengambil elemen berdasarkan ID
var tombolHitung = document.getElementById('hitungBtn');
// Menambahkan event listener pada tombol hitung
tombolHitung.addEventListener('click', function() {
	// Ambil nilai dari input dan ubah menjadi angka
	let nilaiTugas = parseFloat(document.getElementById('tugas').value);
	let nilaiUTS = parseFloat(document.getElementById('uts').value);
	let nilaiUAS = parseFloat(document.getElementById('uas').value);
	// Validasi input agar hanya diisi angka dan berada dalam rentang 0 - 100
	if(isNaN(nilaiTugas) || isNaN(nilaiUTS) || isNaN(nilaiUAS) || 100 < nilaiTugas < 0 || 100 < nilaiUTS < 0  || 100 < nilaiUAS < 0) {
		document.getElementById('result').innerText = "Input harus berupa angka dan bernilai 0 - 100";
		return;
	}
	// Memperbaharui letiabel nilai dengan nilai asli dikali dengan bobot
	nilaiTugas = nilaiTugas * bobotTugas;
	nilaiUTS = nilaiUTS * bobotUTS;
	nilaiUAS = nilaiUAS * bobotUAS;
	// Hitung total niilai
	let totalNilai = nilaiTugas + nilaiUTS + nilaiUAS;
	// Tentukan huruf mutu dan status berdasarkan total nilai
	let hurufMutu;
    	let status = 'Lulus'; //Nilai awal lulus, jika nilai dibawah 60 akan diubah menjadi gagal.
	const batasLulus = 60;
	if (totalNilai < batasLulus) {
		hurufMutu = 'E';
        status = 'Gagal'
	} else if(totalNilai >= 90) {
		hurufMutu = 'A';
	} else if(totalNilai >= 80) {
		hurufMutu = 'B';
	} else if(totalNilai >= 70) {
		hurufMutu = 'C';
	} else {
		hurufMutu = 'D';
	}
	// Tampilkan hasil di bagian result
	document.getElementById('result').innerHTML = `
	<p>Nilai Tugas : ${nilaiTugas}</p>
	<p>Nilai UTS: ${nilaiUTS}</P>
	<p>Nilai UAS: ${nilaiUAS}</P>
	<p>Rerata Tertimbang Akhir: ${totalNilai.toFixed(2)}</p>
	<p>Huruf Mutu: ${hurufMutu}</p>
	<p class="${status}">Status: ${status}</p>
	`;
});
