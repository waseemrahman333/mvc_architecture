<?php 
namespace Framework;
class Viewer{

    public function render(string $filename, $data = []){
        // print $filename;
        // print_r($data);

        // the extract function will extract values from an array and will make it a variable.
        extract($data, EXTR_SKIP);
        // to catch the view and also use for the header already send error in php ob_start() and at the end ob_get_clean();
        // ob_Start will save the output and only on demoand it will start displaying it
        ob_start();
        // require_once "../src/View/" .$filename.".php";
        // we are just including the view and outputting it not catch it 
        require_once 'View/' . $filename . '.php';
        // so the ob_get_clean will return the output to controller not include it. so we have to catch it a variable
        return ob_get_clean();
    }
}