<!DOCTYPE html>
<html>

<head>
  <title>Order Menu</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/order.css') ?>">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

  <div class="container">

    <!-- MENU -->
    <div class="menu-area">
      <h2>My Café</h2>
      <div class="menu-grid">
        <?php foreach ($menu as $m): ?>
          <div class="menu-card" onclick="addCart(<?= $m->id ?>)">
            <?php
            $nama = strtolower(trim($m->nama_menu));
            $nama = preg_replace('/[^a-z0-9 ]/', '', $nama);
            $gambar = str_replace(' ', '-', $nama) . '.jpg';
            ?>

            <img src="<?= base_url('assets/img/' . $gambar) ?>"
              onerror="this.src='<?= base_url('assets/img/default.jpg') ?>'">

            <h4><?= $m->nama_menu ?></h4>
            <p>Rp <?= number_format($m->harga) ?></p>
            <small>Stok: <?= $m->stok ?></small>
          </div>
        <?php endforeach ?>
      </div>
    </div>

    <!-- CART -->
    <div class="cart-area">
      <h3>Keranjang</h3>
      <div id="cart"></div>

      <hr>
      <p>Subtotal: <span id="subtotal">0</span></p>
      <p>Pajak (12%): <span id="pajak">0</span></p>
      <h3>Total: <span id="total">0</span></h3>

      <button class="btn-bayar" onclick="openModal()">Bayar Sekarang</button>
      <div id="modal" class="modal">
        <div class="modal-box">
          <h3>Pilih Metode Pembayaran</h3>

          <form action="<?= base_url('order/bayar_qris') ?>" method="post">
            <button type="submit" class="btn-qris">QRIS</button>
          </form>

          <form action="<?= base_url('order/bayar_tunai') ?>" method="post">
            <button type="submit" class="btn-tunai">TUNAI</button>
          </form>

          <button onclick="closeModal()" class="btn-batal">Batal</button>
        </div>
      </div>
      <script>
        function openModal() {
          document.getElementById('modal').style.display = 'flex';
        }
        function closeModal() {
          document.getElementById('modal').style.display = 'none';
        }
      </script>

      <button class="btn-clear" onclick="clearCart()">Kosongkan</button>
    </div>

  </div>

  <script>
    function addCart(id) {
      $.post("<?= base_url('order/add_cart') ?>", { id: id }, loadCart);
    }

    function minusCart(id) {
      $.post("<?= base_url('order/minus_cart') ?>", { id: id }, loadCart);
    }

    function clearCart() {
      $.post("<?= base_url('order/clear_cart') ?>", function () {
        $('#cart').html('');
        $('#subtotal').html('0');
        $('#pajak').html('0');
        $('#total').html('0');
      });
    }


    function loadCart() {
      $.get("<?= base_url('order/get_cart') ?>", function (res) {
        let data = JSON.parse(res);
        let html = '';
        let subtotal = 0;

        if (data) {
          $.each(data, function (i, v) {
            subtotal += v.harga * v.qty;
            html += `
                <div class="cart-item">
                    <span>${v.nama}</span>
                    <div>
                        <button onclick="minusCart(${v.id})">-</button>
                        ${v.qty}
                        <button onclick="addCart(${v.id})">+</button>
                    </div>
                    <span>Rp ${(v.harga * v.qty).toLocaleString()}</span>
                </div>`;
          });
        }

        let pajak = subtotal * 0.1;
        let total = subtotal + pajak;

        $('#cart').html(html);
        $('#subtotal').html(subtotal.toLocaleString());
        $('#pajak').html(pajak.toLocaleString());
        $('#total').html(total.toLocaleString());
      });
    }

    loadCart();
  </script>


</body>

</html>