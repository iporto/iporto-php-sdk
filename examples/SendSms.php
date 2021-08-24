<?php

require dirname(__FILE__) . '/../vendor/autoload.php';

use iPORTO\Sms\SmsClient;

/**
 * Token gerado em: https://app.iporto.com.br/panel/api
 */
$auth_bearer =
  'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImRiNTkyMWU4YTRiNWY5MGFmMmQ3NWY5NDg2YzJlNTNxWDg2NWYzYmQyNjgyYTg1NTFkYjJjMDliZDRjNcFlOGYyZDVmNTc2MDY5YWFhYjRmIn0.eyJhdWQiOiIxIiwianRpIjoiZGI1OTIxZThhNGI1ZjkwYWYyZDc1Zjk0ODZjMmU1MzEwODY1ZjNiSDI2ODJhODU1MWRiMmMwOWJkNGM2YWU4ZjJkNWY1NzYwNjlhYWFiNGYiLCJpYXQiOjE2MDI3Njc5MzMsIm5iZiI6MTYwMjc2NzkzMywiZXhwIjoxNjM0MzAzOTMzLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.gbz-YHDd0RS8CD01xtD5FN-ovqai0dxK_TrWanJmwsQDSdvVA99VV_-_fQ4Lm-Wa3m9UFg6pc8-R5UYLADpzXC1ppUxwH3DexssC33kaOolalmOo8CQLQJFCDTvuzIxBH4qo_dBsVIsQ94EwcbD6r2GsIBuHZjW5DjCp-eR1UJGacS27MAfnnU-7pBUrNM2vei1Br1-xzSU4caDQ_eNUvV0XhpWxDQ69sPxGsvLmMoD7nGibkBikIppO7L927ruoIMZ13kF7gMrWLIv8f5ecvOuMC4He159FoYfBXimAJ0NJhDz2c8g9GQKOAE5OYGwndQZk0kh4KbL2Rf6gxEeQcco20aLjjwPX6QlKO6BuWyedbyBLEY_vC71P4VHfy7TKvJxTYUKH9K-Qs8M5pWdQLQpiN676BXCNTad5-bLxy88YdM_SzxDeskh9XWjVPgeeiDfjf3u-NoEvwr_rH1s_zMvdgJtl0lsmiAtkIDRForHaH88v1InQJQi0gLb2Ypcgra1UtrJb4NbbCqc2XIKldcnvjQxbm9-VWsOjLrfYYpALa0tS1KVWtUSY4AWt44q_wXo8xZ97YpUV9i25dvwLcwPcy_J7rzSnQxthBttzFf4J5ywl-w811dxJXo7XGxjKDdeF0Z_oCB0WzWzIvxukxBiQMGqR9IfKhYeDGGHDX2A';
// -----------------------------------------------------

/**
 * Envio de SMS.
 */
$objSms = new SmsClient([
  'auth_bearer' => $auth_bearer,
]);
$objSms->setPhoneTo('5551999693869');
$objSms->setMessageBody(
  'SEJA BEM BINDO A <strong>iPORTO</strong>  //
  Acesse nosso Site ===> <a href="https://iporto.com.br">iPORTO.COM.BR</a>
  '
);
$setSms = $objSms->send();

dd($setSms);
