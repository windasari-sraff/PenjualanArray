<?php
session_start();

// Menyimpan data ke session
$_SESSION['nama'] = 'Winda';

echo $_SESSION['nama'];

// Menghapus salah satu data session
unset($_SESSION['nama']);
