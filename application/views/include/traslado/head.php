<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
        <!--<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>-->
      
        <style>
            .btn-circle.btn-xl {
                width: 70px;
                height: 70px;
                padding: 10px 16px;
                border-radius: 35px;
                font-size: 24px;
                line-height: 1.33;
            }

            .btn-circle {
                width: 30px;
                height: 30px;
                padding: 6px 0px;
                border-radius: 15px;
                text-align: center;
                font-size: 12px;
                line-height: 1.42857;
            }
            th, td {
                padding: 10px;
            }
            @media (max-width: 900px) and (min-width: 300px) {
                .step-title { display:table-column; }
            }
            @media (max-width: 1600px) and (min-width: 920px){
                .step-title { display:initial; }
            }
        </style>
        <script src="http://www.google.com/jsapi?key=AIzaSyC-ggbFI6FeJq57KVAOeYBqdKUALh41F-U"></script>
        <script src="http://www.google.com/jsapi?key=AIzaSyC-ggbFI6FeJq57KVAOeYBqdKUALh41F-U"></script>
        <title>Remisse by SIXT Perú</title>

        <!-- Icons -->
        <link rel="shortcut icon" href="<?php echo base_url("Public/rux/images/icons/192x192.png")?>">
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url("Public/rux/images/icons/57x57.png")?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url("Public/rux/images/icons/60x60.png")?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url("Public/rux/images/icons/72x72.png")?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url("Public/rux/images/icons/76x76.png")?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url("Public/rux/images/icons/114x114.png")?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url("Public/rux/images/icons/120x120.png")?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url("Public/rux/images/icons/144x144.png")?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url("Public/rux/images/icons/152x152.png")?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url("Public/rux/images/icons/180x180.png")?>">
        <link rel="icon" type="image/png" href="<?php echo base_url("Public/rux/images/icons/32x32.png")?>" sizes="32x32">
        <link rel="icon" type="image/png" href="<?php echo base_url("Public/rux/images/icons/192x192.png")?>" sizes="192x192">
        <link rel="icon" type="image/png" href="<?php echo base_url("Public/rux/images/icons/96x96.png")?>" sizes="96x96">
        <link rel="icon" type="image/png" href="<?php echo base_url("Public/rux/images/icons/16x16.png")?>" sizes="16x16">
        <link rel="manifest" href="<?php echo base_url("Public/rux/manifest.json")?>">
        <meta name="msapplication-TileColor" content="#FF5F00">
        <meta name="msapplication-TileImage" content="<?php echo base_url("Public/rux/images/icons/192x192.png")?>">
        <meta name="theme-color" content="#FF5F00">
        
        <link rel="stylesheet" href="<?php echo base_url("Public/rux/rux.min.css")?>">
        
        <!-- Incluyendo Culqi Checkout -->
        <script src="https://checkout.culqi.com/js/v3"></script>

        
    </head>
    <body>