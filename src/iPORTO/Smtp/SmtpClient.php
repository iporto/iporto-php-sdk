<?php

/*
 * This file is part of the iPORTO library.
 *
 * (c) Otavio Nogueira <otavio@iporto.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace iPORTO\Smtp;

use Exception;
use iPORTO\Client;

class SmtpClient extends Client
{
  public function __construct(array $params)
  {
    parent::__construct(...func_get_args());
  }

  public function getAll($current_page = 1, $per_page = 5)
  {
    $data = $this->httpClient->httpGet('/panel/smtp', [
      'page' => $current_page,
      'per_page' => $per_page,
    ]);

    return $data;
  }

  public function getOne($domain)
  {
    $data = $this->httpClient->httpGet('/panel/smtp/' . $domain);

    return $data;
  }
}
