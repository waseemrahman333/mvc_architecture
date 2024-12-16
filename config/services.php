<?php 
use Framework\Container;
use App\Database;
 $container = new Container();
//  $db =  new Database( "db", "db", "db", 'db');
 $container->set('App\Database' , function(){
    return new Database("db", "db", "db", 'db');
 });