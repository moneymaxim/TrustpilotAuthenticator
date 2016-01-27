<?php

namespace Trustpilot\Api\Authenticator;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface as GuzzleClientInterface;

class Authenticator
{
    const ENDPOINT = 'https://api.trustpilot.com/v1/oauth/oauth-business-users-for-applications/accesstoken';

    /**
     * @var GuzzleClientInterface
     */
    private $guzzle;

    /**
     * @param GuzzleClientInterface $guzzle
     */
    public function __construct(GuzzleClientInterface $guzzle = null)
    {
        $this->guzzle = (null !== $guzzle) ? $guzzle : new GuzzleClient();
    }

    /**
     * @param string $apiKey
     * @param string $apiSecret
     * @param string $username
     * @param string $password
     * 
     * @return AccessToken
     */
    public function getAccessToken($apiKey, $apiSecret, $username, $password)
    {
        $response = $this->guzzle->request('POST', self::ENDPOINT, [
            'auth' => [$apiKey, $apiSecret],
            'form_params' => [
                'grant_type' => 'password',
                'username' => $username,
                'password' => $password,
            ],
        ]);

        $data = json_decode((string) $response->getBody(), true);

        $token = $data['access_token'];
        $expiry = new \DateTime('@' . (time() + $data['expires_in']));

        return new AccessToken($token, $expiry);
    }
}
