<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $jumlah = $_POST['jumlah'] ?? '';
    $kategori = $_POST['kategori'] ?? '';
    $member = $_POST['member'] ?? '';
    $agree = isset($_POST['agree']);

    $harga_paket = [
        "regular" => 10000,
        "express" => 20000
    ];

    if(!isset($_POST['agree'])){
        echo "<h3>Anda harus menyetujui syarat & ketentuan yang berlaku!</h3>";
        exit;
    }

    if(!array_key_exists($kategori,$harga_paket)){
        echo "<h3>Kategori tidak valid</h3>";
        exit;
    }

    if($jumlah <= 0){
        echo "Jumlah paket tidak valid!";
        exit;
    }

    $total = $jumlah * $harga_paket[$kategori];

    if ($member == "silver") {
            $diskon = 0.1 * $total;
        } elseif ($member == "platinum") {
            $diskon = 0.2 * $total;
        } else {
            $diskon = 0;
        }

        $total_bayar = $total - $diskon;

} else {
    echo "Akses tidak valid! Harus dari form.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<nav class="navbar">
    <a href="index.html" class="navbar-logo">Drone<span>Xpress</span></a>

    <div class="navbar-extra">
      <a href="https://wa.me/081325754374" id="contact" target="_blank">
        <i class="bi bi-voicemail"></i></a>
      <a href="#" id="hamburger-menu">
        <i class="bi bi-list"></i></a>
    </div>
  </nav>

<section class="hero">
  <main class="wrapper invoice">

    <h1>Invoice</h1>

    <div class="input-box">
      <p>Username: <?= $username ?></p>
    </div>

    <div class="input-box">
      <p>Email: <?= $email ?></p>
    </div>

    <div class="input-box">
      <p>Jumlah Paket: <?= $jumlah ?></p>
    </div>

    <div class="input-box">
      <p>Kategori: <?= $kategori ?></p>
    </div>

    <div class="input-box">
      <p>Member: <?= $member ?></p>
    </div>

    <div class="input-box">
      <p>Harga/Paket: Rp <?= $harga_paket[$kategori] ?? 0 ?></p>
    </div>

    <div class="input-box">
      <p>Total: Rp <?= $total ?></p>
    </div>

    <div class="input-box">
      <p>Diskon: Rp <?= $diskon ?></p>
    </div>

    <div class="input-box">
      <p><b>Total Bayar: Rp <?= $total_bayar ?></b></p>
    </div>

    <div class="button-group">
      <a href="landing.html"><button type="button">Lanjut</button></a>
    </div>

  </main>
</section>

</body>
</html>