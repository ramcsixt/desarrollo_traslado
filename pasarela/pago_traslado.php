<?php

    try {
        include_once dirname(__FILE__).'/requests/library/Requests.php';
        Requests::register_autoloader();
        include_once dirname(__FILE__).'/culqi-php/lib/culqi.php';
        
        
        // Configurar tu API Key y autenticación
        
        $SECRET_KEY = "sk_test_9op12o0MDrCU9Gfr";
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
        if (!$charge)
        {
          throw new Exception("esto es un error");
        }
        else{
          echo json_encode($charge);
        }
      
        // continue execution of the bootstrapping phase
    } catch (Exception $e) {
        echo $e->getMessage();
        die();
    }

    exit();
?>