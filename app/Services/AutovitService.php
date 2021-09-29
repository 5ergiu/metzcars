<?php

namespace App\Services;

use App\Exceptions\HaltException;
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

    const GET_VEHICLE_BRANDS_FROM_CATEGORY = self::CATEGORIES_ENDPOINT . self::CATEGORY_CARS . '/makes';

    private RestService $restService;
    private string $autovitToken;

    public function __construct()
    {
        $this->autovitToken = (new AutovitProvider)->getAutovitToken();
        $this->restService  = new RestService;
    }

    /**
     * Get a list of all adverts.
     * @return array
     */
    public function getAdverts(): array
    {
        return $this->getResponse( self::ACCOUNT_ADVERTS_ENDPOINT);
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
        $adverts = $this->getResponse( self::ACCOUNT_ADVERTS_ENDPOINT, $params)['results'];

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
     * @return array
     */
    public function getAdvert(int $id): array
    {
        return $this->getResponse(self::ADVERT_ENDPOINT . $id);
    }

    /**
     * Get all brands from the cars category.
     * @return array
     */
    public function getAllBrands(): array
    {
        return $this->getResponse(self::GET_VEHICLE_BRANDS_FROM_CATEGORY)['options'];
    }

    /**
     * Get all models for a specific brand.
     * @param string $brand
     * @return array
     */
    public function getAllBrandModels(string $brand): array
    {
        return $this->getResponse(self::GET_VEHICLE_BRANDS_FROM_CATEGORY . "/$brand");
    }

    /**
     * Build an api request and return the json_decoded response back.
     * @param string $endpoint
     * @param array $params
     * @param string $method
     * @return array
     */
    private function getResponse(string $endpoint, array $params = [], string $method = self::METHOD_GET): array
    {
        $headers = [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->autovitToken,
            ],
        ];

        $requestParams = array_merge_recursive($headers, $params);

        return json_decode(
            $this->restService->{$method}(
                config('app.autovitApiUrl') . $endpoint,
                $requestParams
            )
            ->getBody()
            ->getContents(),
            true
        );
    }
}
