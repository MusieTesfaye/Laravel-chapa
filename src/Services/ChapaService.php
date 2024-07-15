<?php

namespace Musie\LaravelChapa\Services;

use GuzzleHttp\Client;

class ChapaService
{
    protected $client;
    protected $secretKey;
    protected $publicKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->secretKey = config('chapa.secret_key');
        $this->publicKey = config('chapa.public_key');
    }

    public function initializePayment($data)
    {
        $response = $this->client->post('https://api.chapa.co/v1/transaction/initialize', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->secretKey,
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    public function verifyPayment($tx_ref)
    {
        $response = $this->client->get('https://api.chapa.co/v1/transaction/verify/' . $tx_ref, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->secretKey,
                'Content-Type' => 'application/json',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }
}
