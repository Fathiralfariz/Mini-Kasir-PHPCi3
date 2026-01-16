<!DOCTYPE html>
<html>
<head>
<title>Pembayaran QRIS</title>
<style>
body{
  background:#020617;
  color:white;
  text-align:center;
  padding-top:50px;
}
img{
  width:250px;
  margin-top:20px;
}
</style>
</head>
<body>

<h2>Scan QR untuk Pembayaran</h2>

<img src="<?= base_url('assets/img/qriscontoh.jpg') ?>" alt="QRIS">

<br><br>

<a href="<?= base_url('order/success') ?>" style="color:#22c55e">
Saya Sudah Bayar
</a>

</body>
</html>
