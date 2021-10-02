<?php

namespace App\Services;

use App\Security\AutovitProvider;

class AutovitService
{
    const METHOD_GET  = 'get';
    const METHOD_POST = 'post';

    const STATUS_ACTIVE = 'active';

    const CATEGORY_CARS = 29;

    const ACCOUNT_ADVERTS_ENDPOINT = '/account/adverts/';
    const ADVERT_ENDPOINT          = '/adverts/';
    const CATEGORIES_ENDPOINT      = '/categories/';

    const VEHICLE_BRANDS_ENDPOINT = self::CATEGORIES_ENDPOINT . self::CATEGORY_CARS . '/makes';
    const VEHICLE_MODELS_ENDPOINT = self::CATEGORIES_ENDPOINT . self::CATEGORY_CARS . '/models';

    private RestService $restService;
    private string $autovitToken;

    public function __construct()
    {
        $this->autovitToken = (new AutovitProvider)->getAutovitToken();
        $this->restService  = new RestService;
    }

    /**
     * Get a list of all adverts.
     * @return string
     */
    public function getAdverts(): string
    {
        return $this->getResponse(self::ACCOUNT_ADVERTS_ENDPOINT);
    }

    /**
     * Get a list of all active adverts.
     * @param int|null $page
     * @return array
     */
    public function getActiveAdverts(?int $page): array
    {
        $params = [
            'query' => [
                'limit' => 5,
                'page'  => $page ?? null,
            ],
        ];
        $adverts = json_decode($this->getResponse(self::ACCOUNT_ADVERTS_ENDPOINT, $params), true)['results'];

        foreach ($adverts as $key => $advert) {
            if ($advert['status'] !== self::STATUS_ACTIVE) {
                unset($adverts[$key]);
            }
        }

        return $adverts;
    }

    /**
     * Get details of a specific advert using its unique id.
     * @param int $id
     * @return string
     */
    public function getAdvert(int $id): string
    {
        return $this->getResponse(self::ADVERT_ENDPOINT . $id);
    }

    /**
     * Get all brands from the cars category.
     * @return string
     */
    public function getBrands(): string
    {
        return $this->getResponse(self::VEHICLE_BRANDS_ENDPOINT);
    }

    /**
     * Get all models for a specific brand.
     * @param string $brand
     * @return string
     */
    public function getBrandModels(string $brand): string
    {
        return $this->getResponse(self::VEHICLE_MODELS_ENDPOINT . "/$brand");
    }

    /**
     * Build an api request and return the response back.
     * @param string $endpoint
     * @param array $params
     * @param string $method
     * @return string
     */
    private function getResponse(string $endpoint, array $params = [], string $method = self::METHOD_GET): string
    {
        $headers = [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->autovitToken,
            ],
        ];

        $requestParams = array_merge_recursive($headers, $params);

        return $this->restService->{$method}(
            config('app.autovitApiUrl') . $endpoint,
            $requestParams
        )
        ->getBody()
        ->getContents();
    }
}
