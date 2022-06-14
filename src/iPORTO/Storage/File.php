<?php

/*
 * This file is part of the iPORTO library.
 *
 * (c) Otavio Nogueira <otavio@iporto.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace iPORTO\Storage;

use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\Multipart\FormDataPart;

use Carbon\Carbon;
use Exception;
use iPORTO\Client;

class File extends Client
{
  /**
   * email_from_auth
   *
   * @var mixed
   */
  private $email_from_auth;

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
   * file
   *
   * @return array
   */
  public function file($path_to_file)
  {
    if (!is_file($path_to_file)) {
      throw new Exception("Arquivo $path_to_file não encontrado.");
    }

    $formFields = [
      "upload" => DataPart::fromPath($path_to_file),
    ];

    $formData = new FormDataPart($formFields);
    $data = $this->httpClient->httpUpload('/panel/storage/smtp-attachment-file', $formData);

    if (!$data) {
      throw new Exception("Ocorreu um erro efetuando upload do arquivo anexo.");
    }

    if (!property_exists($data, 'path')) {
      throw new Exception("Ocorreu um erro efetuando upload do arquivo anexo.");
    }

    return (array) $data;
  }
}
