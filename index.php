<?php 

require_once "./vendor/autoload.php";
// use App\Controller\Drupak;
    use Framework\Router;
    use Framework\Dispatcher;



echo "-------------------------------------------------------------";
$router = new Router();

// node should be hard coted and then slug is any number 1 or more time like node/10 here node is controller class
// and 10 is display the action method of controller class
$router->AddTORoute('/{controller}/{action}');
$router->AddTORoute('/node/{slug:\d+}', ["controller"=>"node" , "action"=>"display"]);
$router->AddTORoute('/category/{slug:\d+}', ["controller"=>"category" , "action"=>"display"]);
$router->AddTORoute('/{controller}/{id:\w+}/{action}');



// $routerObj->AddTORoute( "/drupak/view", ["controller"=>"drupak" , "action"=>"view"]);
// $routerObj->AddTORoute( "/drupak/history", ["controller"=>"drupak" , "action"=>"history"]);

 
  $url = parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH);
  // print_R ($url);

//    if the $url is match with the key of the $controllerActionArray it will return the $array with controller and action
   $dispatcher = new Dispatcher($router);
   $dispatcher->handle($url);