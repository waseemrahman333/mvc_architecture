<?php 
namespace Framework;
use ReflectionClass;
class Container {
    // if the binding have databaseClass it will return its values
    // the binding Array will store the class name as a key and the values
    // should be the parameter of the constructor of the class 
    // other then the object and the code in get bellow the binding array is for
    // returning the object of the class passing to it
    
    private array $bindings = [];
    public function set($className , callable $value)
    {
      // the set method will set the binding array add the class as a key and $values the parameter to the class
      //other then the object 
      $this->bindings[$className] = $value;
      // dump( $this->bindings);
    }
    public function get($className)
    {
    // For primitive datatype parameters to constructors
    // like string and int
      if(array_key_exists($className , $this->bindings)){
        return $this->bindings[$className]();
        // dd( $this->bindings[$className] );
      }

      // for returning object
      $classDetail = new ReflectionClass($className);
      // dump($classDetail); 
      if($classDetail->getConstructor() === null){
        return new $className;
      }
      $constructParamArray = $classDetail->getConstructor()->getParameters();
      foreach($constructParamArray as $constructParam){
        // dump($constructParam);
        // dump($constructParam->getType());
        $subClass = $constructParam->getType()->getName();
        // dump ($subClass);
         $ParamToConstruct[] = $this->get($subClass);
      }
      // dump($ParamToConstruct);
      // exit;
      return new $className(...$ParamToConstruct);

    }
}