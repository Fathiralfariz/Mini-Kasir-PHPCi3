<style>
  /* Input edit menu agar lebih jelas */
  .input-dark .form-control {
    background-color: #f0f2f5 !important;
    border-radius: 0.75rem;
    padding: 12px;
    font-weight: 500;
  }

  /* Fokus saat diklik */
  .input-dark .form-control:focus {
    background-color: #e9ecef !important;
    border-color: #344767;
    box-shadow: 0 0 0 2px rgba(52, 71, 103, 0.2);
  }

  /* Label lebih tegas */
  .input-dark label {
    font-weight: 600;
    color: #344767;
  }
</style>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h6>Edit Menu Café</h6>
        </div>

        <div class="card-body">
          <form action="<?= base_url('dashboard/update_menu') ?>" method="post">

            <input type="hidden" name="id" value="<?= $menu['id'] ?>">

            <div class="mb-3 input-dark">
              <label>Nama Menu</label>
              <input type="text" name="nama_menu" value="<?= $menu['nama_menu'] ?>" class="form-control" required>
            </div>

            <div class="mb-3 input-dark">
              <label>Harga</label>
              <input type="number" name="harga" value="<?= $menu['harga'] ?>" class="form-control" required>
            </div>

            <div class="mb-3 input-dark">
              <label>Stok</label>
              <input type="number" name="stok" value="<?= $menu['stok'] ?>" class="form-control" required>
            </div>

            <button type="submit" class="btn bg-gradient-dark">
              Simpan Perubahan
            </button>

            <a href="<?= base_url('dashboard/menu') ?>" class="btn btn-secondary">
              Batal
            </a>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>