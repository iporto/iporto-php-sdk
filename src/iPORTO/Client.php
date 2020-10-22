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
use iPORTO\HttpClient;

/**
 * Client
 */
class Client extends HttpClient
{
  public $httpClient;

  /**
   * __construct
   *
   * @param  mixed $params ==> ['token', 'plan_type', 'credit_type']
   * @return void
   */
  public function __construct(array $params)
  {
    $this->httpClient = new HttpClient($params);
  }

  /**
   * setToken
   *
   * @param  mixed $token
   * @return void
   */
  public function setToken($token = null)
  {
    if (is_null($token)) {
      throw new Exception("Token de Autenticação Inválido ou Indisponível.");
    }
  }
}
