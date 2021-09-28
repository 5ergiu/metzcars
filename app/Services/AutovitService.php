<?php

namespace App\Services;

use App\Exceptions\HaltException;
use App\Security\AutovitProvider;

class AutovitService
{
    const ADVERTS_ENDPOINT = '/account/adverts';

    private RestService $rest;
    private string $autovitToken;

    public function __construct()
    {
        $this->autovitToken = (new AutovitProvider)->getAutovitToken();
        $this->rest         = new RestService;
    }

    /**
     * @throws HaltException
     */
    public function getAdverts(): array
    {
        $response = $this->rest->get(
            config('app.autovitApiUrl') . self::ADVERTS_ENDPOINT, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->autovitToken,
                ],
            ],
        );

        return json_decode($response->getBody()->getContents(), true);
    }
}
