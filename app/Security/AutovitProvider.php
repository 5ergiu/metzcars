<?php

namespace App\Security;

use App\Exceptions\HaltException;
use Illuminate\Support\Facades\Session;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericProvider;
use League\OAuth2\Client\Token\AccessTokenInterface;

/**
 * @property GenericProvider $provider
 */
class AutovitProvider
{
    const TOKEN_ENDPOINT   = '/oauth/token';
    const ACCOUNT_ENDPOINT = '/account/profile';

    public GenericProvider $provider;
    private AccessTokenInterface $accessToken;

    /**
     * @throws HaltException
     */
    public function __construct()
    {
        $this->provider = new GenericProvider([
            'clientId'                => config('app.autovitClientId'),
            'clientSecret'            => config('app.autovitClientSecret'),
            'urlAuthorize'            => $this->getTokenEndpoint(),
            'urlAccessToken'          => $this->getTokenEndpoint(),
            'urlResourceOwnerDetails' => $this->getResourceOwnerDetailsEndpoint(),
        ]);
        $this->setAccessToken();
    }

    /**
     * @return string
     */
    public function getTokenEndpoint(): string
    {
        return config('app.autovitApiUrl') . self::TOKEN_ENDPOINT;
    }

    /**
     * @return string
     */
    public function getResourceOwnerDetailsEndpoint(): string
    {
        return config('app.autovitApiUrl') . self::ACCOUNT_ENDPOINT;
    }

    /**
     * @return void
     * @throws HaltException
     */
    public function setAccessToken(): void
    {
        /** @var AccessTokenInterface|null $accessToken */
        $accessToken = Session::get('AutovitToken');

        try {
            if (!$accessToken) {
                // Try to get an access token using the resource owner password credentials grant.
                $accessToken = $this->provider->getAccessToken('password', [
                    'username' => config('app.autovitUsername'),
                    'password' => config('app.autovitPassword'),
                ]);
            }
            else {
                if ($accessToken->hasExpired()) {
                    $accessToken = $this->provider->getAccessToken('refresh_token', [
                        'refresh_token' => $accessToken->getRefreshToken(),
                    ]);
                }
            }

            $this->saveAccessToken($accessToken);
        } catch (IdentityProviderException $e) {
            throw new HaltException($e->getMessage());
        }
    }

    /**
     * @return string
     */
    public function getAutovitToken(): string
    {
        return $this->accessToken->getToken();
    }

    /**
     * @param AccessTokenInterface $accessToken
     * @return void
     */
    private function saveAccessToken(AccessTokenInterface $accessToken): void
    {
        $this->accessToken = $accessToken;
        Session::put('AutovitToken', $accessToken);
        Session::save();
    }
}
