<?php 
use Framework\Router;
$router = new Router();

// node should be hard coted and then slug is any number 1 or more time like node/10 here node is controller class
// and 10 is display the action method of controller class
$router->AddTORoute('/{controller}/{action}');
$router->AddTORoute('/node/{slug:\d+}', ["controller"=>"node" , "action"=>"display"]);
$router->AddTORoute('/category/{slug:\d+}', ["controller"=>"category" , "action"=>"display"]);
$router->AddTORoute('/{controller}/{id:\w+}/{action}');