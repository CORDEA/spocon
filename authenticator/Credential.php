<?php
/**
 * Created by PhpStorm.
 * User: cordea
 * Date: 2018/08/05
 * Time: 15:06
 */

namespace authenticator;

class Credential
{
    private const FILE_NAME = 'credentials.json';

    private $accessToken = '';
    private $refreshToken = '';

    private function __construct($accessToken, $refreshToken)
    {
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
    }

    public static function store($accessToken, $refreshToken)
    {
        $json = json_encode(array('access_token' => $accessToken, 'refresh_token' => $refreshToken));
        file_put_contents(self::FILE_NAME, $json);
    }

    public static function restore()
    {
        $json = file_get_contents(self::FILE_NAME);
        $decoded = json_decode($json);
        return new Credential($decoded->access_token, $decoded->refresh_token);
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }
}
