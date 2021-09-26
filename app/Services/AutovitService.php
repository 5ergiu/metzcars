<?php

namespace App\Services;

use App\Exceptions\HaltException;

class AutovitService
{
    const ENDPOINT   = 'https://ssl.autovit.ro/api/open';
    const CATEGORIES = '/categories';

    private RestService $rest;

    public function __construct()
    {
        $this->rest = new RestService;
    }

    /**
     * @throws HaltException
     */
    public function getCategories(): array
    {
        $response = $this->rest->get(self::ENDPOINT . self::CATEGORIES);

        dd(json_decode($response->getBody()->getContents(), true));
    }

    /**
     * @param int|null $category
     * @return string
     */
    private function buildGetCategoriesUrl(int $category = null): string
    {
        return self::ENDPOINT . self::CATEGORIES . ($category ? "/$category" : null);
    }
}
