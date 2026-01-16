<div class="container-fluid py-4">

  <!-- ===== FORM TAMBAH MENU ===== -->
  <div class="row">
    <div class="col-md-12 mb-4">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <h6 class="mb-0">Tambah Menu Café</h6>
        </div>

        <div class="card-body p-3">
          <form action="<?= base_url('dashboard/add_menu') ?>" method="post">
            <div class="row align-items-end">

              <div class="col-md-4">
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Nama Menu</label>
                  <input type="text" name="nama_menu" class="form-control" required>
                </div>
              </div>

              <div class="col-md-3">
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Harga</label>
                  <input type="number" name="harga" class="form-control" required>
                </div>
              </div>

              <div class="col-md-3">
                <div class="input-group input-group-outline mb-3">
                  <label class="form-label">Stok</label>
                  <input type="number" name="stok" class="form-control" required>
                </div>
              </div>

              <div class="col-md-2">
                <button type="submit" class="btn bg-gradient-dark w-100 mb-3">
                  <i class="material-symbols-rounded text-sm">add</i> Simpan
                </button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- ===== LIST MENU ===== -->
  <div class="row">
    <div class="col-md-12 mt-4">
      <div class="card">
        <div class="card-header pb-0 px-3">
          <h6 class="mb-0">Daftar Menu</h6>
        </div>

        <div class="card-body pt-3">
          <ul class="list-group">

            <?php if (empty($menu)): ?>
              <li class="list-group-item text-center text-muted">
                Belum ada menu
              </li>
            <?php endif; ?>

            <?php foreach ($menu as $m): ?>
              <li class="list-group-item border-0 p-3 mb-2 bg-gray-100 border-radius-lg">

                <div class="row align-items-center">

                  <!-- INFO MENU -->
                  <div class="col-md-6">
                    <h6 class="mb-1"><?= $m['nama_menu']; ?></h6>
                    <div class="text-xs text-muted">
                      Harga :
                      <span class="text-dark fw-bold">
                        Rp <?= number_format($m['harga'], 0, ',', '.'); ?>
                      </span>
                      &nbsp; | &nbsp;
                      Stok :
                      <span class="text-dark fw-bold">
                        <?= $m['stok']; ?>
                      </span>
                    </div>
                  </div>

                  <!-- AKSI -->
                  <div class="col-md-6 text-end">
                    <a href="<?= base_url('dashboard/edit_menu/' . $m['id']) ?>"
                      class="btn btn-outline-dark btn-sm me-2">
                      <i class="material-symbols-rounded text-sm">edit</i> Edit
                    </a>

                    <a href="<?= base_url('dashboard/delete_menu/' . $m['id']) ?>"
                      class="btn btn-outline-danger btn-sm"
                      onclick="return confirm('Hapus menu ini?')">
                      <i class="material-symbols-rounded text-sm">delete</i> Hapus
                    </a>
                  </div>

                </div>

              </li>
            <?php endforeach; ?>

          </ul>
        </div>
      </div>
    </div>
  </div>

</div>
