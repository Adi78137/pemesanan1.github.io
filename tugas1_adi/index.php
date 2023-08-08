<!DOCTYPE html>
<html>

<head>
  <title>Form Pemesanan Nasi Kotak</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    h1 {
      text-align: center;
    }

    form {
      width: 300px;
      margin: 0 auto;
    }

    label,
    input,
    select {
      display: block;
      margin-bottom: 10px;
    }

    input[type="submit"] {
      margin-top: 15px;
      border-radius: 5px;
      padding: 8px;
      /* Atur padding agar tombol terlihat lebih besar */
      font-size: 16px;
      /* Atur ukuran font pada tombol */
    }

    .result {
      display: grid;
      align-items: center;
      justify-content: center;
      margin-top: 20px;
      padding: 10px;
      border: 1px solid #ccc;
      background-color: #f9f9f9;
    }

    .form-group {
      margin-bottom: 10px;
      /* Atur jarak antar form-group */
      display: flex;
      /* Menggunakan flexbox untuk tata letak */
      align-items: center;
      /* Pusatkan vertikal elemen-elemen dalam form-group */
    }

    .form-group label {
      flex: 1;
      /* Bagian label akan meregang sejajar dengan bagian input */
      margin-right: 10px;
      /* Atur jarak antara label dan input */
    }

    .form-group input,
    .form-group select {
      flex: 2;
      /* Bagian input akan meregang dua kali lipat lebih besar daripada bagian label */
      width: 100%;
      /* Input akan memenuhi lebar form-group */
      padding: 6px;
      /* Atur padding agar input terlihat lebih baik */
      font-size: 16px;
      /* Atur ukuran font */
    }
  </style>
</head>

<body>
  <h1>Form Pemesanan Nasi Kotak</h1>
  <form method="post" action="">
    <div class="form-group">
      <label for="branch">Cabang:</label>
      <select name="branch" id="branch">
        <option value="Majalengka">Majalengka</option>
        <option value="Talaga">Talaga</option>
        <option value="Cikijing">Cikijing</option>
      </select>
    </div>
    <div class="form-group">
      <label for="name">Nama Pelanggan:</label>
      <input type="text" name="name" id="name">
    </div>
    <div class="form-group">
      <label for="phoneNumber">No. HP:</label>
      <input type="text" name="phoneNumber" id="phoneNumber">
    </div>
    <div class="form-group">
      <label for="quantity">Jumlah Pesanan:</label>
      <input type="text" name="quantity" id="quantity">
    </div>
    <input type="submit" name="submit" value="Pesan">
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $branch = $_POST['branch'];
    $name = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber'];
    $quantity = $_POST['quantity'];
    $pricePerItem = 50000; // Harga satuannya (50 ribu)
    $discountPerItem = 50000; // Diskon per item jika lebih dari 10 pesanan
    $minimumQuantityForDiscount = 10; // Jumlah pesanan minimal untuk mendapat diskon

    $totalPriceBeforeDiscount = $pricePerItem * $quantity;
    $totalDiscount = 0;

    if ($quantity > $minimumQuantityForDiscount) {
      $totalDiscount = $discountPerItem * floor($quantity / $minimumQuantityForDiscount);
    }

    $totalPriceAfterDiscount = $totalPriceBeforeDiscount - $totalDiscount;

    echo "<div class='result'>";
    echo "<strong>Pesanan telah diterima:</strong><br>";
    echo "<strong>Cabang: " . $branch . "</strong><br>";
    echo "<strong>Nama Pelanggan: " . $name . "</strong><br>";
    echo "<strong>No. HP: " . $phoneNumber . "</strong><br>";
    echo "<strong>Jumlah: " . $quantity . "</strong><br>";
    echo "<strong>Tagihan: Rp " . number_format($totalPriceBeforeDiscount, 0, ',', '.') . "</strong><br>";

    if ($totalDiscount > 0) {
      echo "<strong>Diskon: Rp " . number_format($totalDiscount, 0, ',', '.') . "</strong><br>";
    }

    echo "<strong>Tagihan: Rp " . number_format($totalPriceAfterDiscount, 0, ',', '.') . "</strong><br>";
    echo "</div>";
  }
  ?>
</body>

</html>