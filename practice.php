<?php
 function addSpaces($paragraph){

    // $sentence = str_split($paragraph,);
    // $sentencestr = implode( " ", $sentence );
    // $sentenceArray = explode( " ", $sentencestr );
   
 
    // array_splice($sentence[] , 4 , 0 , null);


    // print "<pre>";
    // print_r($sentencestr);
    // print "</pre>";
    
// $pattern = '/(\w+) (\d+), (\d+)/i';
// $pattern = "/(Leetcode|Helps|Me|Learn)/";

// $replacement = "$1 ";
// echo preg_replace($pattern, $replacement, $paragraph);
$string = str_replace("Leetcode" , "Leetcode " , $paragraph);
$string1 = str_replace("Helps" , "Helps " , $string);
$string2 = str_replace("Me" , "Me " , $string1);
$string3 = str_replace("Learn" , "Learn " , $string2);

print $string3 ;
// print $string2 ;
  }

  addSpaces("LeetcodeHelpsMeLearn");