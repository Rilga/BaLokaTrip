<x-app-layout>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <div class="container py-5 d-flex justify-content-center">
        <div class="card shadow border-0" style="max-width: 500px;">
            <div class="card-body text-center">
                <!-- Logo Pending -->
                <div class="mb-4">
                    <div style="width: 80px; height: 80px; background-color: #cee2ec; border-radius: 50%; display: flex; justify-content: center; align-items: center; margin: auto;">
                        <i class="bi bi-hourglass-split" style="font-size: 2.5rem;"></i>
                    </div>
                </div>
                <!-- Status Title -->
                <h3 class="mb-3" style="color: #333;">Menunggu Pembayaran</h3>
                <!-- Status Description -->
                <p class="text-muted mb-4">Token pembayaran sedang diproses. Silakan selesaikan pembayaran dengan menekan tombol di bawah.</p>

                @if ($snapToken)
                    <!-- Payment Button -->
                    <div class="d-flex justify-content-center">
                        <button id="pay-button" class="btn text-white" style="background-color: #007bff;">
                            <i class="bi bi-cash"></i> Bayar Sekarang
                        </button>
                    </div>

                    <script type="text/javascript">
                        var payButton = document.getElementById('pay-button');
                        payButton.addEventListener('click', function () {
                            snap.pay('{{ $snapToken }}', {
                                onSuccess: function(result) {
                                    alert('Pembayaran berhasil.');
                                    console.log(result);

                                    // Redirect ke halaman riwayat pesanan
                                    window.location.href = '{{ route('checkout.riwayatpesanan') }}';
                                },
                                onPending: function(result) {
                                    alert('Pembayaran tertunda.');
                                    console.log(result);
                                },
                                onError: function(result) {
                                    alert('Pembayaran gagal.');
                                    console.log(result);
                                }
                            });
                        });
                    </script>
                @else
                    <!-- Error Message -->
                    <p class="text-danger mt-4">Token pembayaran tidak tersedia. Silakan coba lagi.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
