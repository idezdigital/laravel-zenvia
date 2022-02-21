<?php

namespace Idez\LaravelZenvia;

use Illuminate\Support\Facades\Http;

class Zenvia
{
    public const BASE_URL = 'https://api.zenvia.com/v2/';

    public function __construct(private string $token, private string $from = '')
    {
    }

    public function client()
    {
        return Http::withHeaders([
            'X-API-TOKEN' => $this->token,
        ])->baseUrl(self::BASE_URL);
    }

    public function sms($number, $message)
    {
        return $this->client()->post('/channels/sms/messages', [
            'from' => $this->from,
            'to' => $number,
            'contents' => [
                [
                    'type' => 'text',
                    'text' => $message,
                ],
            ],
        ])->throw()->object();
    }
}
