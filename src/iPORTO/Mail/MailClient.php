<?php

/*
 * This file is part of the iPORTO library.
 *
 * (c) Otavio Nogueira <otavio@iporto.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace iPORTO\Mail;

use Carbon\Carbon;
use Exception;
use iPORTO\Client;

class MailClient extends Client
{
  /**
   * email_from_auth
   *
   * @var mixed
   */
  private $email_from_auth;

  /**
   * email_from_visible_mail
   *
   * @var mixed
   */
  private $email_from_visible_mail;

  /**
   * email_from_visible_name
   *
   * @var mixed
   */
  private $email_from_visible_name;

  /**
   * email_to_mail
   *
   * @var mixed
   */
  private $email_to_mail;

  /**
   * email_to_name
   *
   * @var mixed
   */
  private $email_to_name;

  /**
   * email_cc
   *
   * @var mixed
   */
  private $email_cc;

  /**
   * email_html_body
   *
   * @var mixed
   */
  private $email_html_body;

  /**
   * email_reply_to
   *
   * @var mixed
   */
  private $email_reply_to;

  /**
   * email_subject
   *
   * @var mixed
   */
  private $email_subject;

  /**
   * email_attachaments
   *
   * @var mixed
   */
  private $email_attachaments;

  /**
   * email_headers
   *
   * @var mixed
   */
  private $email_headers;

  /**
   * email_headers_tags
   *
   * @var mixed
   */
  private $email_headers_tags;

  /**
   * send_at
   *
   * @var mixed
   */
  private $send_at;

  /**
   * tracking_settings
   *
   * @var mixed
   */
  private $tracking_settings;

  /**
   * __construct
   *
   * @param  mixed $params
   */
  public function __construct(array $params)
  {
    parent::__construct(...func_get_args());
  }

  /**
   * getEmailFromAuth
   *
   * @return string
   */
  public function getEmailFromAuth()
  {
    return $this->email_from_auth;
  }

  /**
   * setEmailFromAuth
   *
   * @param  mixed $value
   * @return void
   */
  public function setEmailFromAuth($value)
  {
    $this->email_from_auth = $value;
  }

  /**
   * getEmailFromAuthDomain
   *
   * @return string
   */
  public function getEmailFromAuthDomain()
  {
    $account = explode("@", $this->getEmailFromAuth());
    return count($account) == 2 ? $account[1] : null;
  }

  /**
   * getEmailFromAuthUser
   *
   * @return string
   */
  public function getEmailFromAuthUser()
  {
    $account = explode("@", $this->getEmailFromAuth());
    return count($account) == 2 ? $account[0] : null;
  }

  /**
   * getEmailFromVisible
   *
   * @return array
   */
  public function getEmailFromVisible()
  {
    return [
      'email_from_visible_mail' => $this->email_from_visible_mail,
      'email_from_visible_name' => $this->email_from_visible_name,
    ];
  }

  /**
   * setEmailFromVisible
   *
   * @param  mixed $email
   * @param  mixed $name
   * @return void
   */
  public function setEmailFromVisible($email, $name = null)
  {
    $this->email_from_visible_mail = $email;
    $this->email_from_visible_name = !is_null($name) ? $name : $email;
  }

  /**
   * getEmailTo
   *
   * @return array
   */
  public function getEmailTo()
  {
    return [
      'email_to_mail' => $this->email_to_mail,
      'email_to_name' => $this->email_to_name,
    ];
  }

  /**
   * setEmailTo
   *
   * @param  mixed $email
   * @param  mixed $name
   * @return void
   */
  public function setEmailTo($email, $name = null)
  {
    $this->email_to_mail = $email;
    $this->email_to_name = !is_null($name) ? $name : $email;
  }

  /**
   * getEmailCc
   *
   * @return array
   */
  public function getEmailCc()
  {
    return !is_null($this->email_cc) ? $this->email_cc : [];
  }

  /**
   * setEmailCc
   *
   * @param  mixed $value
   * @return void
   */
  public function setEmailCc(array $value)
  {
    $this->email_cc = $value;
  }

  /**
   * getEmailHtmlBody
   *
   * @return string
   */
  public function getEmailHtmlBody()
  {
    return $this->email_html_body;
  }

  /**
   * setEmailHtmlBody
   *
   * @param  mixed $value
   * @return void
   */
  public function setEmailHtmlBody($value)
  {
    $this->email_html_body = $value;
  }

  /**
   * getEmailReplyTo
   *
   * @return string
   */
  public function getEmailReplyTo()
  {
    return $this->email_reply_to;
  }

  /**
   * setEmailReplyTo
   *
   * @param  mixed $value
   * @return void
   */
  public function setEmailReplyTo($value)
  {
    $this->email_reply_to = $value;
  }

  /**
   * getEmailSubject
   *
   * @return string
   */
  public function getEmailSubject()
  {
    return $this->email_subject;
  }

  /**
   * setEmailSubject
   *
   * @param  mixed $value
   * @return void
   */
  public function setEmailSubject($value)
  {
    $this->email_subject = $value;
  }

  /**
   * ? @TODO: Função ainda não implementada.
   *
   * getEmailAttachaments
   *
   * @return array
   */
  public function getEmailAttachaments()
  {
    return $this->email_attachaments;
  }

  /**
   * ? @TODO: Função ainda não implementada.
   *
   * setEmailAttachaments
   *
   * @param  mixed $value
   * @return void
   */
  public function setEmailAttachaments(array $value)
  {
    $this->email_attachaments = $value;
  }

  /**
   * getEmailHeaders
   *
   * @return array
   */
  public function getEmailHeaders()
  {
    if (is_null($this->email_headers)) {
      return [];
    }

    $count_headers_in_msg = count($this->email_headers);
    for ($x = 0; $count_headers_in_msg > $x; $x++) {
      if (stristr($this->email_headers[$x], 'List-Unsubscribe') || stristr($this->email_headers[$x], 'X-Mailer-Tracking-Code')) {
        unset($this->email_headers[$x]);
      }
      $x++;
    }

    return $this->email_headers;
  }

  /**
   * setEmailHeaders
   *
   * @param  mixed $value
   * @return void
   */
  public function setEmailHeaders(array $value)
  {
    $this->email_headers = $value;
  }

  /**
   * getEmailHeadersTags
   *
   * @return array
   */
  public function getEmailHeadersTags()
  {
    return !is_null($this->email_headers_tags) ? $this->email_headers_tags : [];
  }

  /**
   * setEmailHeadersTags
   *
   * @param  mixed $value
   * @return void
   */
  public function setEmailHeadersTags(array $value)
  {
    $this->email_headers_tags = $value;
  }

  /**
   * ? @TODO: Função ainda não implementada/disponível via API.
   *
   * getSendAt
   *
   * @return string
   */
  public function getSendAt()
  {
    return $this->send_at;
  }

  /**
   * ? @TODO: Função ainda não implementada/disponível via API.
   *
   * setSendAt
   *
   * @param  mixed $value
   * @return void
   */
  public function setSendAt($value)
  {
    $this->send_at = $value;
  }

  /**
   * getTrackingSettings
   *
   * @return void
   */
  public function getTrackingSettings()
  {
    return $this->tracking_settings;
  }

  /**
   * setTrackingSettings
   *
   * @param  mixed $track_open | contabilizar aberturas.
   * @param  mixed $track_link | contabilizar cliques.
   * @return array
   */
  public function setTrackingSettings($track_open, $track_link)
  {
    $this->tracking_settings = [
      'track_open' => $track_open ? 'yes' : 'no',
      'track_link' => $track_link ? 'yes' : 'no',
    ];
  }

  /**
   * send
   *
   * @return object
   */
  public function send()
  {
    $data = $this->httpClient->httpPost('/panel/smtp/' . $this->getEmailFromAuthDomain() . '/account/' . $this->getEmailFromAuth() . '/email/send', [
      'email_from' => $this->getEmailFromVisible()['email_from_visible_mail'],
      'email_from_name' => $this->getEmailFromVisible()['email_from_visible_name'],
      'email_to' => $this->getEmailTo()['email_to_mail'],
      'email_to_name' => $this->getEmailTo()['email_to_name'],
      'email_cc' => implode(",", $this->getEmailCc()),
      'email_html_body' => $this->getEmailHtmlBody(),
      'email_reply_to' => $this->getEmailReplyTo(),
      'email_subject' => $this->getEmailSubject(),
      'email_attachaments' => null,
      'email_headers' => $this->getEmailHeaders(),
      'email_headers_tags' => implode(",", $this->getEmailHeadersTags()),
      'send_at' => Carbon::now(),
      'tracking_settings' => $this->getTrackingSettings(),
    ]);

    return $data;
  }
}
