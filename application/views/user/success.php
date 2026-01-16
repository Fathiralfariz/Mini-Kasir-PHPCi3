<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Berhasil</title>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body style="background:#020617">

<script>
Swal.fire({
    icon: 'success',
    title: 'Pembayaran Berhasil 🎉',
    text: 'Terima kasih, transaksi telah disimpan',
    confirmButtonText: 'Order Lagi',
    confirmButtonColor: '#22c55e',
    background: '#020617',
    color: '#ffffff',
    allowOutsideClick: false
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = "<?= base_url('order') ?>";
    }
});
</script>

</body>
</html>
