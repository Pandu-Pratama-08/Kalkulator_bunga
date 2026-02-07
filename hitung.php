<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   echo "<link rel='stylesheet' href='style.css'>";
   echo "<div class='container'>";
   echo "<h1>Hasil Perhitungan</h1>";

   if (isset($_POST['hitungTunggal'])) {
      $pokok = $_POST['pokokTunggal'];
      $bunga = $_POST['bungaTunggal'];
      $waktu = $_POST['waktuTunggal'];
      $jenisWaktu = $_POST['jenisWaktuTunggal'];

      function hitungBungaTunggal($pokok, $bunga, $waktu, $jenisWaktu)
      {
         switch ($jenisWaktu) {
            case "bulan":
               $waktu = $waktu * 1 / 12;
               break;
            case "triwulan":
               $waktu = $waktu * 3 / 12;
               break;
            case "caturwulan":
               $waktu = $waktu * 4 / 12;
               break;
            case "semester":
               $waktu = $waktu * 6 / 12;
               break;
            case "tahun":
               break;
         }
         return $pokok * ($bunga / 100) * $waktu;
      }

      $hasilBunga = hitungBungaTunggal($pokok, $bunga, $waktu, $jenisWaktu);
      $totalPinjaman = $pokok + $hasilBunga;

      echo "<div class='result'><h2>Hasil Bunga Tunggal</h2>";
      echo "<p>Pokok Pinjaman: Rp " . number_format($pokok, 2, ',', '.') . "</p>";
      echo "<p>Bunga: Rp " . number_format($hasilBunga, 2, ',', '.') . "</p>";
      echo "<p><strong>Total Pinjaman: Rp " . number_format($totalPinjaman, 2, ',', '.') . "</strong></p></div>";
   }

   if (isset($_POST['hitungMajemuk'])) {
      $pokok = $_POST['pokokMajemuk'];
      $bunga = $_POST['bungaMajemuk'];
      $waktu = $_POST['waktuMajemuk'];
      $jenisWaktu = $_POST['jenisWaktuMajemuk'];

      function hitungBungaMajemuk($pokok, $bunga, $waktu, $jenisWaktu)
      {
         switch ($jenisWaktu) {
            case "bulan":
               $waktu = $waktu * 1 / 12;
               break;
            case "triwulan":
               $waktu = $waktu * 3 / 12;
               break;
            case "caturwulan":
               $waktu = $waktu * 4 / 12;
               break;
            case "semester":
               $waktu = $waktu * 6 / 12;
               break;
            case "tahun":
               break;
         }
         return $pokok * pow((1 + $bunga / 100), $waktu) - $pokok;
      }

      $hasilBunga = hitungBungaMajemuk($pokok, $bunga, $waktu, $jenisWaktu);
      $totalPinjaman = $pokok + $hasilBunga;

      echo "<div class='result'><h2>Hasil Bunga Majemuk</h2>";
      echo "<p>Pokok Pinjaman: Rp " . number_format($pokok, 2, ',', '.') . "</p>";
      echo "<p>Bunga: Rp " . number_format($hasilBunga, 2, ',', '.') . "</p>";
      echo "<p><strong>Total Pinjaman: Rp " . number_format($totalPinjaman, 2, ',', '.') . "</strong></p></div>";
   }

   echo "<a href='index.php' style='display:block;margin-top:20px;text-align:center;color:#3498db;text-decoration:none;'>← Kembali ke Kalkulator</a>";
   echo "</div>";
}
