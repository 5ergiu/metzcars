<?php

namespace App\Services;

use App\Exceptions\HaltException;

class AutovitService
{
    const ENDPOINT   = 'https://ssl.autovit.ro/api/open';
    const ADVERTS    = '/adverts';

    private RestService $rest;

    public function __construct()
    {
        $this->rest = new RestService;
    }

    /**
     * @throws HaltException
     */
    public function getAdverts(): array
    {
        $response = $this->rest->get(self::ENDPOINT . self::ADVERTS);

        dd(json_decode($response->getBody()->getContents(), true));
    }
}
