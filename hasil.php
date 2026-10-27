<?php
session_start();

// Validasi akses halaman
if (!isset($_SESSION['nota_belanja'])) {
    header("Location: index.php");
    exit();
}

$nota = $_SESSION['nota_belanja'];
unset($_SESSION['nota_belanja']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nota Pembayaran Toko Online</title>
</head>
<body>
    <h2>Nota / Invoice Pembayaran</h2>
    <p>Nomor Transaksi: <strong><?php echo $nota['nomor_invoice']; ?></strong></p>
    
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th>Deskripsi Produk</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo htmlspecialchars($nota['nama_produk']); ?></td>
                <td>Rp <?php echo number_format($nota['harga_satuan'], 0, ',', '.'); ?></td>
                <td align="center"><?php echo $nota['jumlah']; ?></td>
                <td>Rp <?php echo number_format($nota['subtotal'], 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <td colspan="3" align="right"><strong>Potongan Diskon (10% jika > 5Jt)</strong></td>
                <td>- Rp <?php echo number_format($nota['diskon'], 0, ',', '.'); ?></td>
            </tr>
            <tr style="background-color: #eafaf1;">
                <td colspan="3" align="right"><strong>Total Akhir yang Harus Dibayar</strong></td>
                <td><strong>Rp <?php echo number_format($nota['total_bayar'], 0, ',', '.'); ?></strong></td>
            </tr>
        </tbody>
    </table>

    <p>Metode Pembayaran Pilihan: <strong><?php echo htmlspecialchars($nota['pembayaran']); ?></strong></p>
    
    <hr>
    <p><em>Terima kasih telah berbelanja di toko kami!</em></p>
    <a href="index.php">Kembali Belanja</a>
</body>
</html>