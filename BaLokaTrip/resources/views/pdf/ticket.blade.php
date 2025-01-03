<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 14px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .order-details {
            margin-bottom: 20px;
        }
        .order-details table {
            width: 100%;
            border-collapse: collapse;
        }
        .order-details table, .order-details th, .order-details td {
            border: 1px solid #ddd;
        }
        .order-details th, .order-details td {
            padding: 8px;
            text-align: left;
        }
        .product-image {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Order Detail</h1>
        <p>{{ $order->ticket->name }}</p>
    </div>
    <div class="product-image">
        <img src="{{ public_path('images/tiket.png') }}" alt="Gambar Tiket" style="width: 705px; height: auto;">
    </div>
    <br><br><br>
    <div class="order-details">
        <table>
            <tr>
                <th>Tempat Wisata</th>
                <td>{{ $order->ticket->product->name ?? 'Nama produk tidak tersedia' }}</td>
            </tr>
            <tr>
                <th>Nama Pembeli</th>
                <td>{{ $order->user->name ?? 'Nama produk tidak tersedia' }}</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>{{ $order->quantity }}</td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Voucher</th>
                <td>{{ $order->voucher_code ?? 'Tidak menggunakan voucher' }}</td>
            </tr>
            <tr>
                <th>Diskon</th>
                <td>Rp {{ number_format($order->discount, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
