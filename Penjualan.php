<?php
// Commit 4 – Output Akhir (Versi Benar & Rapi)

// Array data barang
$nama_barang = ["Leptop", "Printer", "Keyboard", "Mouse", "Flasdisk"];
$harga_barang = [15000, 10000, 12000, 20000, 25000];

// Array untuk data pembelian
$beli = [];       // Menyimpan nama barang dibeli
$jumlah = [];     // Menyimpan jumlah barang yang dibeli
$total = [];      // Menyimpan total harga per barang
$grandtotal = 0;  // Menyimpan total semua pembelian

// Perulangan untuk proses pembelian acak sebanyak 5 produk
for ($i = 0; $i < 5; $i++) {
    $index = rand(0, count($nama_barang) - 1); // Pilih barang acak
    $beli[$i] = $nama_barang[$index];
    $jumlah[$i] = rand(1, 5); // Jumlah acak 1–5
    $total[$i] = $harga_barang[$index] * $jumlah[$i];
    $grandtotal += $total[$i];
}

// ===============================
// PERHITUNGAN TOTAL TAMBAHAN
// ===============================
$rata_rata = $grandtotal / count($total);
$max_total = max($total);
$min_total = min($total);

// ===============================
// OUTPUT DALAM BENTUK TABEL
// ===============================
echo "<h2 style='text-align:center;'>POLGAN MART🛒</h2>";
echo "<table border='1' cellpadding='8' cellspacing='0' width='70%' align='center' style='border-collapse:collapse;'>";

// Header tabel
echo "<tr style='background:#f0f0f0; text-align:center;'>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
      </tr>";

// Isi tabel
for ($i = 0; $i < count($beli); $i++) {
    echo "<tr align='center'>
            <td>" . ($i + 1) . "</td>
            <td>" . $beli[$i] . "</td>
            <td>" . $jumlah[$i] . "</td>
            <td>Rp " . number_format($total[$i], 0, ',', '.') . "</td>
          </tr>";
}

// Garis pemisah
echo "<tr><td colspan='4'><hr></td></tr>";

// Baris grand total
echo "<tr style='background:#e0e0e0; font-weight:bold;'>
        <td colspan='3' align='right'>Grand Total</td>
        <td>Rp " . number_format($grandtotal, 0, ',', '.') . "</td>
      </tr>";

echo "</table>";


?>
