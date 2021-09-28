<?php

namespace App\Services;

use App\Exceptions\HaltException;
use App\Security\AutovitProvider;

class AutovitService
{
    const STATUS_ACTIVE = 'active';

    const ADVERTS_ENDPOINT = '/account/adverts';

    private RestService $restService;
    private string $autovitToken;

    public function __construct()
    {
        $this->autovitToken = (new AutovitProvider)->getAutovitToken();
        $this->restService  = new RestService;
    }

    /**
     * Get a list of all adverts.
     * @throws HaltException
     */
    public function getAdverts(): array
    {
        return json_decode(
            $this->restService->get(
            config('app.autovitApiUrl') . self::ADVERTS_ENDPOINT, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $this->autovitToken,
                    ],
                ],
            )
            ->getBody()
            ->getContents(),
            true
        );
    }

    /**
     * Get a list of all active adverts.
     * @param int|null $page
     * @return array
     * @throws HaltException
     */
    public function getActiveAdverts(?int $page): array
    {
        return json_decode(
            $this->restService->get(
                config('app.autovitApiUrl') . self::ADVERTS_ENDPOINT, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $this->autovitToken,
                    ],
                    'query' => [
                        'limit' => 5,
                        'page'  => $page ?? null,
                    ],
                ],
            )
            ->getBody()
            ->getContents(),
            true
        )['results'];
    }
}
