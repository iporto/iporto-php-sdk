<?php

/*
 * This file is part of the iPORTO library.
 *
 * (c) Otavio Nogueira <otavio@iporto.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace iPORTO;

use Exception;
use Symfony\Component\HttpClient\HttpClient as SymfonyHttpClient;

class HttpClient
{
  private $httpClient;

  /**
   * The default base URL.
   *
   * @var string
   */
  private const BASE_URL = 'https://api.iporto.com.br/api';

  /**
   * The default user agent header.
   *
   * @var string
   */
  private const USER_AGENT = 'iporto-php-sdk-client/1.0';

  public function __construct(array $params)
  {
    $this->httpClient = SymfonyHttpClient::create([
      'auth_bearer' => $params['auth_bearer'],
    ]);
  }

  public function httpGet($url, array $query = [])
  {
    $response = $this->httpClient->request('GET', self::BASE_URL . $url, [
      'query' => $query,
      'headers' => [
        'Accept' => 'application/json',
        'User-Agent' => self::USER_AGENT,
      ],
    ]);

    if ($response->getStatusCode() == 401) {
      return json_encode([
        'errors' => 'token de autenticação inválido/expirado.',
      ]);
    }

    if ($response->getStatusCode() == 200) {
      return json_decode($response->getContent());
    }

    return $response;
  }

  public function httpPost($url, array $query = [])
  {
    $response = $this->httpClient->request('POST', self::BASE_URL . $url, [
      'query' => $query,
      'headers' => [
        'Accept' => 'application/json',
        'User-Agent' => self::USER_AGENT,
      ],
    ]);

    if ($response->getStatusCode() == 401) {
      return json_encode([
        'errors' => 'token de autenticação inválido/expirado.',
      ]);
    }

    if ($response->getStatusCode() == 200) {
      return json_decode($response->getContent());
    }

    return $response;
  }
}
