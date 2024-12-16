<?php 

namespace Framework;

class Router{
 
    public $routes = [];

    public function AddTORoute($path , $controllerActionArray = []){
        $this->routes[$path] = $controllerActionArray;
        
    }
    
    public function match($path){

        // the url path is trim becuase i want to remove the starting forword slash from the path
        $path =trim($path, '/');
 
//    $path =implode("/", $path);
   print_r($path);
       foreach($this->routes as $route =>$eleDetails){
        // the route the key of  each element of routes array is pass to the regex method
        
        $pattern = $this->changeRouteToRegex($route);
    //    print_r($pattern);
        // now compare the path with the regex 
        #^(?<controller>[a-z][a-z0-9]*)/(?<action>[a-z][a-z0-9]*)$#
        print_r($path);
       if(preg_match($pattern , $path, $matches)){
        //   the below array filter remove the numeric key values from the array 
        // and show only the string key with values.
          $matches =  array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);
        //   print_r($matches);
        
        //   print_r($eleDetails);
        //   exit;
        //   $complete_slug_Array = $matches + $eleDetails;
          $complete_slug_Array = array_merge($matches, $eleDetails);
       }

        // print_r($complete_slug_Array);
       
       }

       // the following if condition will be apply when we have the details array with the key in index page
       // when passing values to the addtoroutes we pass the array too then we can use this condition.
        // -----------------------------------------
        // if(array_key_exists($path , $this->routes)){
        //     // print " route is matched";
        //     return $this->routes[$path];
            // print_r($this->routes);
            
        // }
        // else{
        //     false;
        // }
        // ----------------------------------------------
        if($matches){
            // dump($matches);
            return $matches;

        }if($complete_slug_Array){
        //   dump($complete_slug_Array);
            return $complete_slug_Array;
        }else{
            // return false;
        }
        
        
    
       
    }
    // the route from loop on routes array inside match function
    public function changeRouteToRegex($route){
        // the forword slash is removed from the route which is pass form
        $route =trim($route , '/');
        // print_r($route);
        // echo"<br>";
        // need to expload the {controller}/{action}, to and array [[0]=>{controller}, [1]=>{action}]
        $elements = explode("/", $route);
        // print_r($elements);
       

        // the is loop on elements = [[0]=>{controller}, [1]=>{action}],
        // $ele is the controller first time and action  on second time 
        $elementArray= array_map(function($ele){
            // this is the pattern for matching the controller and action
            // print_r($ele); 
            $pattern = "#^\{([a-z][a-z0-9]*)\}$#";
            //  we need to preg_match it to check it with the pattern
            //preg_match function for controller and action 
            if(preg_match($pattern , $ele , $matches)){
                return "(?<".$matches[1].">[a-z][a-z0-9-_]*)";
            }// pregmatch for slug pattern
            // echo "<br>";
            $pattern_slug = '#^\{([a-z][a-z0-9]*):(.*)\}$#';
            if(preg_match($pattern_slug , $ele , $smatches)){
                // dump($smatches);
                 return "(?<".$smatches[1].">".$smatches[2].")";
              
            }
            return $ele;
            
        },$elements);// this is the array on which the map loop 
        // print_r( $elementArray);
         $RoutRegex = implode("/",$elementArray);

        // print_r( $RoutRegex);
         $pattern = "#^". $RoutRegex . "$#";
           return $pattern;
        }
    

}
