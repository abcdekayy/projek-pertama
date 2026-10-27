<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $produk_mentah = $_POST['produk'];
    $jumlah = intval($_POST['jumlah']);
    $pembayaran = $_POST['pembayaran'];

    // Memisahkan nama produk dan harga menggunakan fungsi explode
    $detail_produk = explode('|', $produk_mentah);
    $nama_produk = $detail_produk[0];
    $harga_satuan = floatval($detail_produk[1]);

    // Hitung total kotor
    $subtotal = $harga_satuan * $jumlah;

    // Logika Diskon: Jika belanja > 5 Juta, dapat diskon 10%
    $diskon = 0;
    if ($subtotal > 5000000) {
        $diskon = $subtotal * 0.10;
    }

    // Hitung total akhir yang harus dibayar
    $total_bayar = $subtotal - $diskon;

    // Simpan hasil ke dalam session
    $_SESSION['nota_belanja'] = [
        'nama_produk' => $nama_produk,
        'harga_satuan' => $harga_satuan,
        'jumlah' => $jumlah,
        'subtotal' => $subtotal,
        'diskon' => $diskon,
        'total_bayar' => $total_bayar,
        'pembayaran' => $pembayaran,
        'nomor_invoice' => 'INV-' . uppercase(uniqid())
    ];

    // Alihkan ke halaman hasil
    header("Location: hasil.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}

// Fungsi bantu untuk merapikan kode invoice
function uppercase($str) {
    return strtoupper(substr($str, -6));
}
?>
