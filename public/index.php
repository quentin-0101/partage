<?php

require '../vendor/autoload.php';
ini_set('memory_limit', '256M');

if(isset($_GET['controller'])){
    $controller = $_GET['controller'];
} else $controller = 'main';


$action = $_GET['action'] ?? "index";
$controllerClassName = "App\Controllers\Controller".ucfirst($controller);
if(class_exists($controllerClassName) && in_array($action, get_class_methods($controllerClassName))) $controllerClassName::$action();
else{
    require __DIR__."/../src/Templates/page_notfound.php"; // Charge la vue
}


// https://webinfo.iutmontp.univ-montp2.fr/~gaunyq/sae-projet-php-eshop/public/index.php