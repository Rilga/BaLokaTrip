<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;

class MidtransService
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.sanitize');
        Config::$is3ds = config('services.midtrans.3ds');

        logger()->info('Midtrans Configuration:', [
            'server_key' => Config::$serverKey,
            'is_production' => Config::$isProduction,
            'sanitize' => Config::$isSanitized,
            '3ds' => Config::$is3ds,
        ]);

        if (!Config::$serverKey) {
            throw new \Exception('Server Key is missing. Please check your configuration.');
        }
    }


    /**
     * Membuat transaksi menggunakan Midtrans Snap
     *
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function createTransaction(array $params)
    {
        try {
            return Snap::createTransaction($params);
        } catch (\Exception $e) {
            // Tangani error dengan log
            \Log::error('Midtrans Error: ' . $e->getMessage());
            throw $e;
        }
    }
}
