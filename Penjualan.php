<?php
// Commit 1 – Setup Awal
// POLGAN MART --

echo "-- POLGAN MART --<br><br>";



// Commit 2 – Logika Pembelian (Versi Tabel)

// Array data barang
$nama_barang = ["leptop", "printer", "keyboard", "mose", "flasdisk"];
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
// OUTPUT DALAM BENTUK TABEL
// ===============================
echo "<h2>Data Pembelian</h2>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th> Harga (Rp)</th>
      </tr>";

for ($i = 0; $i < count($beli); $i++) {
    echo "<tr>";
    echo "<td>" . ($i+1) . "</td>";
    echo "<td>" . $beli[$i] . "</td>";
    echo "<td>" . $jumlah[$i] . "</td>";
    echo "<td>Rp " . number_format($total[$i], 0, ',', '.') . "</td>";
    echo "</tr>";

    for ($i = 0; $i < count($beli); $i++) { echo "<tr>"; echo "<td>" . ($i + 1) . "</td>"; echo "<td>" . $beli[$i] . "</td>"; echo "<td>" . $jumlah[$i] . "</td>"; echo "<td>Rp " . number_format($total[$i], 0, ',', '.') . "</td>"; echo "</tr>"; } echo "<tr> <td colspan='3' align='right'><b>Grand Total</b></td> <td><b>Rp " . number_format($grandtotal, 0, ',', '.') . "</b></td> </tr>"; echo "</table>";
}
