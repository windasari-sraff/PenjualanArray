<?php
// Commit 5 – Versi dengan Diskon (Tanpa Total Bayar)

// Array data barang
$kode_barang = ["BRG001", "BRG002", "BRG003", "BRG004", "BRG005"];
$nama_barang = ["Leptop", "Printer", "Keyboard", "Mouse", "Flasdisk"];
$harga_barang = [15000, 10000, 12000, 20000, 25000];




// Array untuk data pembelian
$kode = [];
$beli = [];
$jumlah = [];
$total = [];
$grandtotal = 0;



// Proses pembelian acak sebanyak 5 produk
for ($i = 0; $i < 5; $i++) {
    $index = rand(0, count($nama_barang) - 1);
    $kode[$i] = $kode_barang[$index];
    $beli[$i] = $nama_barang[$index];
    $jumlah[$i] = rand(1, 5);
    $total[$i] = $harga_barang[$index] * $jumlah[$i];
    $grandtotal += $total[$i];
}

// ===============================
// PERHITUNGAN DISKON
// ===============================
if ($grandtotal <= 50000) {
    $diskon_persen = 5;
} elseif ($grandtotal > 50000 && $grandtotal <= 100000) {
    $diskon_persen = 10;
} else {
    $diskon_persen = 20;
}

$diskon_rp = ($diskon_persen / 100) * $grandtotal;

// ===============================
// OUTPUT TABEL
// ===============================
echo "<h2 style='text-align:center;'>POLGAN MART🛒</h2>";
echo "<table border='1' cellpadding='8' cellspacing='0' width='80%' align='center' style='border-collapse:collapse;'>";



// Header tabel
echo "<tr style='background:#f0f0f0; text-align:center;'>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
      </tr>";



// Isi tabel
for ($i = 0; $i < count($beli); $i++) {
    echo "<tr align='center'>
            <td>" . ($i + 1) . "</td>
            <td>" . $kode[$i] . "</td>
            <td>" . $beli[$i] . "</td>
            <td>" . $jumlah[$i] . "</td>
            <td>Rp " . number_format($total[$i], 0, ',', '.') . "</td>
          </tr>";
}



// Grand total
echo "<tr style='background:#e0e0e0; font-weight:bold;'>
        <td colspan='4' align='right'>Grand Total</td>
        <td>Rp " . number_format($grandtotal, 0, ',', '.') . "</td>
      </tr>";



// Diskon
echo "<tr style='background:#f9f9f9; font-weight:bold;'>
        <td colspan='4' align='right'>Diskon ({$diskon_persen}%)</td>
        <td>- Rp " . number_format($diskon_rp, 0, ',', '.') . "</td>
      </tr>";

echo "</table>";
?>
