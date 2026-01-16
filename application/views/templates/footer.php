<style>
@media (max-width: 991.98px) {
  .sidenav {
    transform: translateX(-100%);
    transition: transform 0.3s ease;
    z-index: 9999;
    pointer-events: none;
  }

  .g-sidenav-show .sidenav {
    transform: translateX(0);
    pointer-events: auto;
  }

  #iconNavbarSidenav {
    z-index: 10000;
    position: relative;
    cursor: pointer;
  }
}
</style>


<footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a class="font-weight-bold" target="_blank">Fathir</a>
                for a better web.
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
<script>
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".input-group-outline input").forEach(input => {

    // cek saat load
    if (input.value.trim() !== "") {
      input.closest(".input-group-outline").classList.add("is-filled");
    }

    // saat diketik
    input.addEventListener("input", function () {
      if (this.value.trim() !== "") {
        this.closest(".input-group-outline").classList.add("is-filled");
      } else {
        this.closest(".input-group-outline").classList.remove("is-filled");
      }
    });
  });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll('a.nav-link:not(#iconNavbarSidenav)').forEach(link => {
    link.addEventListener('click', function (e) {

      if (
        this.target === '_blank' ||
        this.href.includes('#') ||
        this.classList.contains('no-transition')
      ) return;

      e.preventDefault();
      document.body.classList.add('page-fade-out');

      setTimeout(() => {
        window.location.href = this.href;
      }, 150);
    });
  });
});
</script>

<script>
window.addEventListener('pageshow', function () {
  document.body.classList.remove('page-fade-out');
  document.body.style.opacity = '1';
});
</script>

<style>
body {
  transition: opacity 0.15s ease-out;
}
.page-fade-out {
  opacity: 0;
}
</style>

  <!--   Core JS Files   -->
  <script src="<?=base_url('/assets/js/core/popper.min.js') ?>" ></script>
  <script src="<?=base_url('/assets/js/core/bootstrap.min.js') ?>"></script>
  <script src="<?=base_url('/assets/js/plugins/perfect-scrollbar.min.js') ?>" ></script>
  <script src="<?=base_url('/assets/js/plugins/smooth-scrollbar.min.js') ?>" ></script>
  <script src="<?=base_url('/assets/js/plugins/chartjs.min.js') ?>" ></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url('/assets/js/material-dashboard.min.js?v=3.2.0') ?>"></script>

