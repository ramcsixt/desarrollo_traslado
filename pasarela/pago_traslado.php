<?php

 include_once dirname(__FILE__).'/requests/library/Requests.php';
Requests::register_autoloader();
include_once dirname(__FILE__).'/culqi-php/lib/culqi.php';


// Configurar tu API Key y autenticación

$SECRET_KEY = "sk_test_ecc25ac1dd4b6680";
$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

// Creamos Cargo a una tarjeta
$charge = $culqi->Charges->create(
    array(
      "amount" => $_REQUEST['precio'],
      "capture" => true,
      "currency_code" => "PEN",
      "description" => $_REQUEST['producto'],
      "email" => $_REQUEST['email'],
      "installments" => 0,
      "antifraud_details" => array(
        "address" => "Villa el salvador",
        "address_city" => "LIMA",
        "country_code" => "PE",
        "first_name" => "RICHARD",
        "last_name" => "MARTINEZ",
        "phone_number" => "902355932",
    ),
      "source_id" => $_REQUEST['token']
    )
);

//Respuesta
/*
  "antifraud_details" => array(
          "address" => "Av. Lima 123",
          "address_city" => "LIMA",
          "country_code" => "PE",
          "first_name" => "Will",
          "last_name" => "Muro",
          "phone_number" => "9889678986",
      ),
 */
print_r($charge);

exit();

?>