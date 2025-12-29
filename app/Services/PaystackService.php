<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PaystackService
{
    protected $baseUrl = 'https://api.paystack.co';
    protected $secretKey;

    public function __construct()
    {
        $this->secretKey = env('PAYSTACK_SECRET_KEY');
    }

    public function initializeTransaction($email, $amount, $reference = null)
    {
        // Paystack amount is in kobo (x100)
        $amountInKobo = $amount * 100;

        $payload = [
            'email' => $email,
            'amount' => $amountInKobo,
            'currency' => 'GHS', // Explicitly set currency
            'callback_url' => route('payment.callback'),
        ];

        if ($reference) {
            $payload['reference'] = $reference;
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->secretKey,
            'Content-Type' => 'application/json',
            'Cache-Control' => 'no-cache',
        ])->post($this->baseUrl . '/transaction/initialize', $payload);

        return $response->json();
    }

    public function verifyTransaction($reference)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->secretKey,
            'Cache-Control' => 'no-cache',
        ])->get($this->baseUrl . '/transaction/verify/' . $reference);

        return $response->json();
    }
}
