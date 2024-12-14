<?php

// require_once "vendor/autoload.php";
// use App\Controller\Drupak;
    // use App\;/
    // $Article_controller = new ArticleController;
    // $controller = new Drupak();
    // $controller-> view();
    // $Article_controller -> show();
    // print "this is show";

    function addSpaces($paragraph){

      $sentence = explode(" ", $paragraph);
      print "<pre>";
      print_r($sentence);
      print "</pre>";

    }

    addSpaces("LeetcodeHelpsMeLearn");
