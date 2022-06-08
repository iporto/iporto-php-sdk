<?php

require dirname(__FILE__) . '/../vendor/autoload.php';

use iPORTO\Mail\MailClient;

/**
 * Token gerado em: https://app.iporto.com.br/panel/api
 */
$auth_bearer =
  'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzUyZDk3ZjdmZjc1M2IxODkzOTZmMDVjNmQwYmJhN2ZkMDhhZjhiNmJjZDdlNzJiYzVjNjdhODg1MWFkMzI0MGUxMzFjMzg5NDMzNzU4ZGYiLCJpYXQiOjE2NDM0MDU1NjYsIm5iZiI6MTY0MzQwNTU2NiwiZXhwIjoxODAxMTcxOTY2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.g1hfGADOGDErgyfYw6WHoHDBSC4x_td51-XNIyygm0rB_32ZEqG29AgoA9wp2VIgf3nIvjBp3NMyqYQ194znKj3Bp610Vj0clTEIw_f-hegwFFRvv6QiQnIIAiRNuSy9Mj94nokdVeud-_Uvld_IZ7dJak0nuR2Rk6dTHDPC2lOo__72nAqZwSQtvFg0t3UEl1rMowR4RpbLgGaUhrrpmnNWGGaxdNxAwSF8TIprUCW3QyO3xvQk_BOAnm9S2iMTR2DKBP8aZuuD-aiW5Rn0BOQu5vOEEq1uS8Q0AzItHSaqhWrnUewWK2HKv_kw-sHSUtO1gKuu2dp6bLpkfXoXAlT3FkMGXxAQRIH_jW_QnISxoDsy_1GG_f75pk4m1RU9Lr8zhYg_pmAajNQOjtKkPb23ARO1JxntP1fLRw4QsRBUBTSOh-Kk8s1i8s1d5y-K9e9rTqwk4SPJvPdC7KvoiEoeRkcG29vHz4HRQUeOiPJnf388KaWbjgxgEfXrS1Q2JQKW3lcgFYtOlTyu16Yk6HYRIp63A35evHkJWye2aGvMoyNbPqxfxanY9a1DHnOiMD8h8SsqWyrVMVhwiIMlBZmN-lpb7cIBzDVjtc2YMYQsyJhdHi61T13zlxCHSunR9ZpmDWTKrELL9rc7s9cR3uhU0FPUzFferZp3sI6BZKs';
// -----------------------------------------------------

/**
 * Envio de E-mail.
 */
$objMail = new MailClient([
  'auth_bearer' => $auth_bearer,
]);
$objMail->setEmailFromAuth('no-reply@iporto.com.br');
$objMail->setEmailFromVisible('no-reply@iporto.com.br');
$objMail->setEmailTo('otavio@iporto.com');
$objMail->setEmailHtmlBody(
  'SEJA BEM BINDO A <strong>iPORTO</strong>  //
  Acesse nosso Site ===> <a href="https://iporto.com.br">iPORTO.COM.BR</a>
  '
);
$objMail->setEmailSubject('iPORTO: ' . date('H:i:s'));
$objMail->setEmailHeaders(['X-API-Company: iPORTO', 'X-API-SDK: PHP']);
$objMail->setEmailHeadersTags(['iPORTO', 'API', 'External']);
$objMail->setTrackingSettings(true, true, 'track-s1');
$objMail->setRedirectType('HTM'); // SERVER | HTM
$setMail = $objMail->send();

dd($setMail);
