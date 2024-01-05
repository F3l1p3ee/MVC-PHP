<?php 
require_once "../vendor/autoload.php";

// Insstanciando a classe Route.php
$route = new \App\Route;
echo "Está funcionando <hr>";
print_r($route->getUrl());

?>