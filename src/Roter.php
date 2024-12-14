<?php 
namespace App;

class Roter{
 
    public $roter = [];

    public function AddtoRoter($path , $detailsArray){
        $this->roter[$path] = $detailsArray;
        print_r($this->roter);
        foreach($this->roter as $rot){
            $this->matchMethod($rot);

          
    }
}
public function matchMethod($urlpath){
    print($urlpath);

    if(array_key_exists($path , $this->roter)){
        // print " route is matched";
        return $this->routes[$urlpath];
        print_r($this->routes);
        
    }
    else{
      
}


}
}