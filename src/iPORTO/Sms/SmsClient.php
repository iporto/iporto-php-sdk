<?php

/*
 * This file is part of the iPORTO library.
 *
 * (c) Otavio Nogueira <otavio@iporto.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace iPORTO\Sms;

use Exception;
use iPORTO\Client;

class SmsClient extends Client
{
  /**
   * phone_from
   *
   * @var mixed
   */
  private $phone_from;

  /**
   * phone_to
   *
   * @var mixed
   */
  private $phone_to;

  /**
   * message_body
   *
   * @var mixed
   */
  private $message_body;

  /**
   * __construct
   *
   * @param  mixed $params
   */
  public function __construct(array $params)
  {
    parent::__construct(...func_get_args());
  }

  public function getPhoneFrom()
  {
    return $this->phone_from;
  }

  public function setPhoneFrom($value)
  {
    $this->phone_from = $value;
  }

  public function getPhoneTo()
  {
    return $this->phone_to;
  }

  public function setPhoneTo($value)
  {
    $this->phone_to = preg_replace('/[^0-9]/', '', $value);
  }

  public function getMessageBody()
  {
    return $this->message_body;
  }

  public function setMessageBody($value)
  {
    $this->message_body = $value;
  }

  /**
   * send
   *
   * @return object
   */
  public function send()
  {
    $data = $this->httpClient->httpPost('/panel/pkg/sms/send', [
      'phone_from' => $this->getPhoneFrom(),
      'phone_to' => $this->getPhoneTo(),
      'message_body' => $this->getMessageBody(),
    ]);

    return $data;
  }
}
