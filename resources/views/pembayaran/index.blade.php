<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <!-- Tambahkan CSS Anda, contoh: Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Script Midtrans Snap.js -->
    <script type="text/javascript" src="{{ config('midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Detail Pembayaran</h3>
            </div>
            <div class="card-body">
                <p><strong>ID Transaksi:</strong> {{ $transaksi->id }}</p>
                <p><strong>Total Tagihan:</strong> Rp {{ number_format($transaksi->total_harga_transaksi, 0, ',', '.') }}</p>
                <p><strong>Status:</strong> <span class="badge bg-warning">{{ $transaksi->payment_status }}</span></p>
                <hr>
                <p>Silakan selesaikan pembayaran Anda.</p>
                <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // Ambil tombol bayar
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Panggil snap.pay() dengan snap token dari controller
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* Anda dapat menangani sukses di sini */
                    alert("Pembayaran berhasil!");
                    console.log(result);
                    window.location.href = '/umum/transaksi'; // Arahkan ke halaman riwayat transaksi
                },
                onPending: function(result) {
                    /* Biasanya untuk pembayaran pending seperti bank transfer */
                    alert("Menunggu pembayaran Anda!");
                    console.log(result);
                    window.location.href = '/umum/transaksi';
                },
                onError: function(result) {
                    /* Tangani error di sini */
                    alert("Pembayaran gagal!");
                    console.log(result);
                },
                onClose: function() {
                    /* Jika pelanggan menutup popup tanpa menyelesaikan pembayaran */
                    alert('Anda menutup popup tanpa menyelesaikan pembayaran');
                }
            })
        });
    </script>
</body>

</html>
