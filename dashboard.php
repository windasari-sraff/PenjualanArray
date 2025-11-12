<?php
session_start();

// =======================================
// CEK LOGIN
// =======================================
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// =======================================
// DATA BARANG & PEMBELIAN ACak
// =======================================
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

// =======================================
// PERHITUNGAN DISKON
// =======================================
if ($grandtotal <= 50000) {
    $diskon_persen = 5;
} elseif ($grandtotal > 50000 && $grandtotal <= 100000) {
    $diskon_persen = 10;
} else {
    $diskon_persen = 20;
}

$diskon_rp = ($diskon_persen / 100) * $grandtotal;
$total_bayar = $grandtotal - $diskon_rp;
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard - POLGAN MART🛒</title>
<style>
body { font-family: 'Poppins', sans-serif; background: #fff0f5; color: #333; margin: 0; padding: 20px; }
h2 { text-align: center; background: linear-gradient(90deg, #f472b6, #ec4899); color: white; padding: 15px; border-radius: 12px; box-shadow: 0 3px 8px rgba(0,0,0,0.15); }
table { width: 80%; margin: 25px auto; border-collapse: collapse; border-radius: 12px; overflow: hidden; box-shadow: 0 5px 15px rgba(255,182,193,0.4); }
th, td { padding: 12px 15px; text-align: center; }
th { background-color: #f9a8d4; color: white; font-weight: 600; text-transform: uppercase; }
tr:nth-child(even) { background-color: #ffe4ec; }
tr:hover { background-color: #fbcfe8; transition: 0.3s; }
.total { background-color: #fbcfe8; font-weight: bold; }
.diskon { background-color: #f9a8d4; color: #fff; font-weight: bold; }
.bayar { background-color: #fce7f3; font-weight: bold; }
.footer { text-align: center; margin-top: 25px; font-style: italic; color: #d63384; }
button { display: block; margin: 20px auto; padding: 10px 18px; background: linear-gradient(90deg, #ec4899, #f472b6); color: white; font-weight: bold; border: none; border-radius: 25px; cursor: pointer; box-shadow: 0 3px 8px rgba(0,0,0,0.15); transition: all 0.3s ease; }
button:hover { background: linear-gradient(90deg, #db2777, #f9a8d4); transform: scale(1.05); }
.welcome { text-align: center; margin-bottom: 20px; }
.logout { text-align: center; margin-top: 15px; }
</style>
</head>
<body>


<header style="display:flex; justify-content:space-between; align-items:center; background:linear-gradient(90deg,#f472b6,#ec4899); padding:15px; border-radius:12px;">
    <h2 style="margin:0; color:white;">💖 POLGAN MART 🛒</h2>
    <div style="text-align:right; color:white;">
        <h3 style="margin:0;">Selamat datang, <?php echo $_SESSION['username']; ?>!</h3>
        <p style="margin:0;">Role: <?php echo $_SESSION['role']; ?></p>
    </div>
</header>


<table border="1">
    <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Total Harga</th>
    </tr>
    <?php for ($i = 0; $i < count($beli); $i++): ?>
    <tr>
        <td><?php echo $i + 1; ?></td>
        <td><?php echo $kode[$i]; ?></td>
        <td><?php echo $beli[$i]; ?></td>
        <td><?php echo $jumlah[$i]; ?></td>
        <td>Rp <?php echo number_format($total[$i], 0, ',', '.'); ?></td>
    </tr>
    <?php endfor; ?>
    <tfoot>
        <tr class="total">
            <td colspan="4" align="right">Grand Total</td>
            <td>Rp <?php echo number_format($grandtotal, 0, ',', '.'); ?></td>
        </tr>
        <tr class="diskon">
            <td colspan="4" align="right">Diskon (<?php echo $diskon_persen; ?>%)</td>
            <td>- Rp <?php echo number_format($diskon_rp, 0, ',', '.'); ?></td>
        </tr>
        <tr class="bayar">
            <td colspan="4" align="right">Total Pembayaran</td>
            <td>Rp <?php echo number_format($total_bayar, 0, ',', '.'); ?></td>
        </tr>
    </tfoot>
</table>

<div class="logout">
    <a href="logout.php"><button>Logout</button></a>
</div>

<p class="footer">Terima kasih sudah belanja di <b>POLGAN MART</b> 💕<br>
Semoga harimu manis seperti warna pink ini 💖</p>

</body>
</html>
