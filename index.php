<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Bunga</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Kalkulator Bunga</h1>

        <div class="navbar">
            <button id="btnTunggal" class="active" onclick="showForm('tunggal')">Bunga Tunggal</button>
            <button id="btnMajemuk" onclick="showForm('majemuk')">Bunga Majemuk</button>
        </div>

        <!-- Form Bunga Tunggal -->
        <form method="POST" action="hitung.php" id="formTunggal">
            <label for="pokokTunggal">Pokok Pinjaman (Rp):</label>
            <input type="text" id="pokokTunggal" name="pokokTunggal" required>

            <label for="bungaTunggal">Persentase Bunga (%):</label>
            <input type="number" step="0.01" id="bungaTunggal" name="bungaTunggal" required>

            <label for="waktuTunggal">Waktu Pinjaman:</label>
            <input type="number" id="waktuTunggal" name="waktuTunggal" required>

            <label for="jenisWaktuTunggal">Jenis Waktu:</label>
            <select id="jenisWaktuTunggal" name="jenisWaktuTunggal" required>
                <option value="bulan">Bulan</option>
                <option value="triwulan">Triwulan</option>
                <option value="caturwulan">Caturwulan</option>
                <option value="semester">Semester</option>
                <option value="tahun">Tahun</option>
            </select>

            <button type="submit" name="hitungTunggal" class="btn-submit">Hitung Bunga Tunggal</button>
        </form>

        <!-- Form Bunga Majemuk -->
        <form method="POST" action="hitung.php" id="formMajemuk" style="display:none;">
            <label for="pokokMajemuk">Pokok Pinjaman (Rp):</label>
            <input type="text" id="pokokMajemuk" name="pokokMajemuk" required>

            <label for="bungaMajemuk">Persentase Bunga (%):</label>
            <input type="number" step="0.01" id="bungaMajemuk" name="bungaMajemuk" required>

            <label for="waktuMajemuk">Waktu Pinjaman:</label>
            <input type="number" id="waktuMajemuk" name="waktuMajemuk" required>

            <label for="jenisWaktuMajemuk">Jenis Waktu:</label>
            <select id="jenisWaktuMajemuk" name="jenisWaktuMajemuk" required>
                <option value="bulan">Bulan</option>
                <option value="triwulan">Triwulan</option>
                <option value="caturwulan">Caturwulan</option>
                <option value="semester">Semester</option>
                <option value="tahun">Tahun</option>
            </select>

            <button type="submit" name="hitungMajemuk" class="btn-submit">Hitung Bunga Majemuk</button>
        </form>
    </div>

    <script>
        // fungsi ubah tampilan form
        function showForm(tipe) {
            const formTunggal = document.getElementById('formTunggal');
            const formMajemuk = document.getElementById('formMajemuk');
            const btnTunggal = document.getElementById('btnTunggal');
            const btnMajemuk = document.getElementById('btnMajemuk');

            if (tipe === 'tunggal') {
                formTunggal.style.display = 'block';
                formMajemuk.style.display = 'none';
                btnTunggal.classList.add('active');
                btnMajemuk.classList.remove('active');
            } else {
                formTunggal.style.display = 'none';
                formMajemuk.style.display = 'block';
                btnTunggal.classList.remove('active');
                btnMajemuk.classList.add('active');
            }
        }

        // fungsi ubah format input menjadi currency
        function formatCurrency(input) {
            let value = input.value.replace(/[^\d]/g, ''); // hapus selain angka
            if (value) {
                value = parseInt(value).toLocaleString('id-ID'); // ubah ke format rupiah
                input.value = value;
            }
        }

        // fungsi untuk menghapus titik sebelum dikirim ke backend
        function removeDotsBeforeSubmit() {
            const pokokInputs = [document.getElementById('pokokTunggal'), document.getElementById('pokokMajemuk')];
            pokokInputs.forEach(input => {
                if (input && input.value) {
                    input.value = input.value.replace(/\./g, '');
                }
            });
        }

        // tambahkan event listener
        document.querySelectorAll('#pokokTunggal, #pokokMajemuk').forEach(input => {
            input.addEventListener('input', () => formatCurrency(input));
        });

        // bersihkan titik sebelum kirim form
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', removeDotsBeforeSubmit);
        });
    </script>
</body>

</html>