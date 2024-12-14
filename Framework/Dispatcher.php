<?php  
namespace Framework;
use ReflectionMethod;
use ReflectionClass;
use App\Database;

class Dispatcher{

      private Router $router;

    // constructor function
    public function __construct(Router $router){
       $this->router = $router;
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
          $controller = $this->objGetter($controllerClass);
          // $controller = new $controllerClass($viewer);
          $reflectionMethod = new ReflectionMethod($controller ,$action);
          // dd($reflectionMethod);
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
    public function objGetter($className){
      
      $classDetail = new ReflectionClass($className);
      dump($classDetail);
      if($classDetail->getConstructor() === null){
        return new $className;
      }
      $constructParamArray = $classDetail->getConstructor()->getParameters();
      foreach($constructParamArray as $constructParam){
        $subClass = $constructParam->getType()->getName();
         $ParamToConstruct[] = $this->objGetter($subClass);
      }
      dump($ParamToConstruct);
      // exit;
      return new $className(...$ParamToConstruct);

    }
}
