<?php 

require_once "./vendor/autoload.php";
// use App\Controller\Drupak;
    use Framework\Router;
    use Framework\Dispatcher;
    use Framework\Container;
    use App\Database;



echo "-------------------------------------------------------------";

require "config/Routes.php";


  $url = parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH);
  // print_R ($url);


//    if the $url is match with the key of the $controllerActionArray it will return the $array with controller and action
    require "config/services.php";
   $dispatcher = new Dispatcher($router ,$container);
   $dispatcher->handle($url);