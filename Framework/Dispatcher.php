<?php  
namespace Framework;
use ReflectionMethod;
use ReflectionClass;
use App\Database;
class Dispatcher{

      // private Router $router;
      private Container $container;


    // constructor function
    public function __construct(private Router $router, Container $container){
      //  $this->router = $router;
       $this->container = $container;

    }
    // make an object for the contorller and call action through controller class,
    public function handle($url){
        $detail = $this->router->match($url);
        // if detail array has values 
          if($detail){
            // dump($detail);
              $namespace = "App\\Controller\\";
              $classname = ucwords($detail['controller'],'-');
              $classname = str_replace("-" , "" , $classname);
              // print $classname;
            $controllerClass = $namespace .$classname;
            // print $controllerClass;
            $actionName = ucwords($detail['action'],'-');
            $actionName = str_replace("-" , "" , $actionName);
            $actionName = lcfirst($actionName);
            $action =$actionName;
            // print $action;
            // hardcotted viewer class initialization
            // $viewer = new Viewer();
            // controller class is automatically instantiated through objgetter
          // $controller = $this->objGetter($controllerClass);
          // the above line is commented because now we are initailzing the class through container
          $controller = $this->container->get($controllerClass);
          // $controller = new $controllerClass($viewer);
          $reflectionMethod = new ReflectionMethod($controller ,$action);
          // dd($reflectionMethod);
          // this is for the slug url like node/10
          $parameters = $reflectionMethod->getParameters();
          // dump($parameters);
          $paramsArray = [];
          foreach($parameters as $param){
            $param->getName();
          $paramsArray[$param->getName()] = $detail[$param->getName()];
          // dump($paramsArray );
          // dump(...$paramsArray);
          }
          $controller->$action(...$paramsArray);
          }else{
            print "root not found";
          };
    }
}
