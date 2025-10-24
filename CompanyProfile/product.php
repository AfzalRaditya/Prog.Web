<?php

$message = '';
$error = '';


$products = [
    1 => ['name' => 'Tas Kain / Goodie Bag', 'desc' => 'Spunbond & Non-Woven untuk event, polos hingga sablon custom.', 'min_order' => 100, 'base_price' => 1500],
    2 => ['name' => 'Kardus & Kotak Siap Pakai', 'desc' => 'Box Botol, Box Arsip, dan Sheet Packing siap kirim.', 'min_order' => 50, 'base_price' => 3000],
    3 => ['name' => 'Lakban Logistik', 'desc' => 'Lakban cokelat/bening berbagai ukuran. Pengaman kiriman.', 'min_order' => 12, 'base_price' => 12000],
    4 => ['name' => 'Tas Makanan & Hajatan', 'desc' => 'Tas khusus Box Nasi. Sangat populer untuk acara lokal.', 'min_order' => 100, 'base_price' => 2000]
];


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_consult'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $jenis_produk = htmlspecialchars($_POST['jenis_produk']);
    $pesan = htmlspecialchars($_POST['pesan']);

    
    if (empty($nama) || empty($email) || empty($phone)) {
        $error = "Semua kolom wajib diisi!";
    } else {
        
        $message = "Terima kasih, $nama! Pesan Anda telah kami terima. Kami akan segera menghubungi Anda melalui $phone.";
        $_POST = array(); 
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk & Katalog - Muktijaya1</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <header>
        <div class="logo">
            <h1>MUKTIJAYA1</h1>
            <p>Your Packaging Solution</p>
        </div>
        <nav>
            <a href="index.html">Home</a>
            <a href="about.html">Tentang Kami</a>
            <a href="product.php">Produk & Katalog</a>
        </nav>
    </header>

    <main>
        <section class="section">
            <h3>Katalog Produk Kami</h3>
            
            <div class="product-grid">
                <?php foreach ($products as $id => $product): ?>
                    <div class="product-card">
                        
                        <?php
                           
                            $image_name = '';
                            if ($id == 1) $image_name = 'img\tas_kain.jpg';      
                            else if ($id == 2) $image_name = 'img\kardus_box.jpg'; 
                            else if ($id == 3) $image_name = 'img\lakban.jpg';
                            else if ($id == 4) $image_name = 'img\tas_hajatan.jpg';
                        ?>
                        
                        <img src="<?php echo $image_name; ?>" alt="<?php echo $product['name']; ?>">
                        
                        <h4><?php echo $product['name']; ?></h4>
                        <p style="font-size: 14px;"><?php echo $product['desc']; ?></p>
                        <a href="product.php?detail_id=<?php echo $id; ?>" class="cta-button" style="padding: 8px 15px; font-size: 14px; background-color: var(--primary-color);">Lihat Detail</a>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (isset($_GET['detail_id']) && isset($products[$_GET['detail_id']])): 
                $detail = $products[$_GET['detail_id']];
            ?>
                <div class="calculator-section" style="margin-top: 50px; border: 2px solid var(--primary-color);">
                    <h4 style="color: var(--primary-color);">Detail Produk: <?php echo $detail['name']; ?></h4>
                    <p><strong>Deskripsi:</strong> <?php echo $detail['desc']; ?></p>
                    <p><strong>Minimal Order:</strong> <?php echo number_format($detail['min_order']); ?> Pcs</p>
                    <p><strong>Harga Estimasi Dasar:</strong> Rp <?php echo number_format($detail['base_price']); ?>,- / Pcs</p>
                </div>
            <?php endif; ?>


            <div class="calculator-section">
                <h3>Kalkulator Estimasi Kardus Kustom</h3>
                <form id="calc-form">
                    <label for="jenis">Jenis Kardus:</label>
                    <select id="jenis">
                        <option value="3000">Kardus Single Wall (Rp 3.000/Unit Dasar)</option>
                        <option value="5000">Kardus Double Wall (Rp 5.000/Unit Dasar)</option>
                    </select>

                    <label for="panjang">Panjang (P) cm:</label>
                    <input type="number" id="panjang" min="1" value="20" required>

                    <label for="lebar">Lebar (L) cm:</label>
                    <input type="number" id="lebar" min="1" value="15" required>

                    <label for="tinggi">Tinggi (T) cm:</label>
                    <input type="number" id="tinggi" min="1" value="10" required>

                    <label for="qty">Kuantitas (Qty) Pcs:</label>
                    <input type="number" id="qty" min="50" value="100" required>
                    
                    <button type="button" onclick="calculateEstimasi()" class="cta-button" style="margin-top: 20px;">Hitung Estimasi Biaya</button>
                </form>

                <div id="estimasi-result">
                    </div>
            </div>

            <div class="form-section">
                <h3>Konsultasi & Pemesanan Kustom</h3>
                
                <?php if ($message): ?>
                    <p style="color: green; font-weight: bold;"><?php echo $message; ?></p>
                <?php elseif ($error): ?>
                    <p style="color: red; font-weight: bold;"><?php echo $error; ?></p>
                <?php endif; ?>

                <form method="POST" action="product.php" id="consult-form">
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" id="nama" name="nama" required value="<?php echo htmlspecialchars($_POST['nama'] ?? ''); ?>">

                    <label for="email">Email (Wajib Valid):</label>
                    <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">

                    <label for="phone">Nomor WA/Telepon (Untuk Dihubungi):</label>
                    <input type="tel" id="phone" name="phone" required placeholder="Contoh: 081234567890" value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">

                    <label for="jenis_produk">Jenis Produk yang Diminati:</label>
                    <select id="jenis_produk" name="jenis_produk">
                        <option value="Kardus Kustom">Kardus Kustom</option>
                        <option value="Tas Spunbond Kustom">Tas Spunbond Kustom</option>
                        <option value="Produk Logistik">Produk Logistik (Lakban, dll)</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>

                    <label for="pesan">Pesan/Detail Kebutuhan:</label>
                    <textarea id="pesan" name="pesan" rows="4"><?php echo htmlspecialchars($_POST['pesan'] ?? ''); ?></textarea>

                    <button type="submit" name="submit_consult" class="cta-button" style="margin-top: 20px;">Kirim Permintaan Konsultasi</button>
                </form>
            </div>

        </section>
    </main>

    <footer>
        <div class="footer-info">
            <h4>Hubungi Kami</h4>
            <p>PT. Muktijaya Solusi Kemasan</p>
            <p>Jl. Raya Langsep No. 12, Kota Malang, Jatim, 65146</p>
            <p>Telp: (0341) 777-1111</p>
            <p>Email: info@muktijaya1.com</p>
        </div>
        <div class="footer-hours">
            <h4>Jam Operasional</h4>
            <p>Senin - Sabtu</p>
            <p>08.00 - 17.00 WIB</p>
        </div>
        <div class="footer-social">
            <h4>Ikuti Kami</h4>
            <div class="social-icons">
                <a href="#" style="font-size: 24px;">&#9733;</a> <a href="#" style="font-size: 24px;">&#9733;</a>
                <a href="#" style="font-size: 24px;">&#9733;</a>
            </div>
        </div>
    </footer>

    <script>
    

    function calculateEstimasi() {
        const jenisHarga = parseFloat(document.getElementById('jenis').value);
        const panjang = parseFloat(document.getElementById('panjang').value);
        const lebar = parseFloat(document.getElementById('lebar').value);
        const tinggi = parseFloat(document.getElementById('tinggi').value);
        const qty = parseFloat(document.getElementById('qty').value);
        const resultDiv = document.getElementById('estimasi-result');

        if (panjang > 0 && lebar > 0 && tinggi > 0 && qty >= 50 && jenisHarga > 0) {
            
            const luasPermukaan = 2 * (panjang * lebar + panjang * tinggi + lebar * tinggi) / 1000;
            const qtyMultiplier = qty > 500 ? 0.95 : 1.0; 
            const hargaPerPcs = jenisHarga + (luasPermukaan * 50); 
            const totalEstimasi = Math.round(hargaPerPcs * qty * qtyMultiplier);

            
            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
            });

            resultDiv.innerHTML = `Estimasi Biaya Total: <strong>${formatter.format(totalEstimasi)}</strong> <br> (Harga belum termasuk biaya desain & pengiriman final.)`;
        } else {
            resultDiv.innerHTML = 'Mohon isi semua data dengan benar. Kuantitas minimal adalah 50 Pcs.';
        }
    }


    
    $(document).ready(function(){
        $("#consult-form").submit(function(e) {
            const email = $("#email").val();
            const phone = $("#phone").val();
            let isValid = true;

            
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("Format email tidak valid.");
                isValid = false;
            }

            
            const phoneRegex = /^\d{8,15}$/;
            if (!phoneRegex.test(phone)) {
                alert("Nomor Telepon/WA harus berupa angka dan minimal 8 digit.");
                isValid = false;
            }

            if (!isValid) {
                e.preventDefault(); 
            }
        });
    });
    </script>
</body>

</html>
