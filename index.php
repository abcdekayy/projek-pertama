<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toko Online Sederhana</title>
</head>
<body>
    <h2>Katalog & Pemesanan Produk</h2>
    
    <form action="proses.php" method="POST">
        <label for="produk">Pilih Produk:</label><br>
        <select id="produk" name="produk" required>
            <option value="">-- Pilih Barang --</option>
            <option value="Laptop Asus Ultra|8500000">Laptop Asus Ultra - Rp 8.500.000</option>
            <option value="Smartphone Samsung S24|12000000">Smartphone Samsung S24 - Rp 12.000.000</option>
            <option value="Headphone Sony WH|3500000">Headphone Sony WH - Rp 3.500.000</option>
            <option value="Mouse Gaming Logitech|500000">Mouse Gaming Logitech - Rp 500.000</option>
        </select>
        <br><br>

        <label for="jumlah">Jumlah Beli:</label><br>
        <input type="number" id="jumlah" name="jumlah" min="1" required><br><br>

        <label for="pembayaran">Metode Pembayaran:</label><br>
        <select id="pembayaran" name="pembayaran" required>
            <option value="Transfer Bank">Transfer Bank</option>
            <option value="E-Wallet (OVO/Dana)">E-Wallet (OVO/Dana)</option>
            <option value="COD (Bayar di Tempat)">COD (Bayar di Tempat)</option>
        </select>
        <br><br>

        <button type="submit">Proses Transaksi</button>
    </form>
</body>
</html>