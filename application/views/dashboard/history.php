<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="<?= base_url('assets/css/order.css') ?>">

<div class="container-fluid py-4">

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header pb-0">
          <h6>History Transaksi</h6>
          <p class="text-sm mb-0">Riwayat transaksi café (dummy)</p>
        </div>

        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-3">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Tanggal</th>
                  <th>Total</th>
                  <th>Pajak</th>
                  <th>Grand Total</th>
                  <th>Metode</th>
                  <th>Status</th>
                </tr>
              </thead>

              <tbody>
                <?php foreach ($transaksi as $t): ?>
                  <tr>
                    <td>TRX-<?= $t['id']; ?></td>

                    <td>
                      <?= date('d-m-Y H:i', strtotime($t['created_at'])); ?>
                    </td>

                    <td>
                      Rp <?= number_format($t['total'], 0, ',', '.'); ?>
                    </td>

                    <td>
                      Rp <?= number_format($t['pajak'], 0, ',', '.'); ?>
                    </td>

                    <td>
                      <strong>
                        Rp <?= number_format($t['grand_total'], 0, ',', '.'); ?>
                      </strong>
                    </td>

                    <td>
                      <?php if ($t['metode_pembayaran'] == 'QRIS'): ?>
                        <span class="badge badge-qris">
                          <i class="fas fa-qrcode"></i> QRIS
                        </span>
                      <?php else: ?>
                        <span class="badge badge-tunai">
                          <i class="fas fa-money-bill-wave"></i> Tunai
                        </span>
                      <?php endif; ?>
                    </td>


                    <td>
                      <span class="badge bg-success">
                        Selesai
                      </span>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>


            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>