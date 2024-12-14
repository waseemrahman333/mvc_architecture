<?php
namespace App\Controller;
use App\Model\NewsModel;
use Framework\Viewer ;
class NewsController 
{
   // initialize viewer variable and pass an object to it through construct
      private Viewer $viewer;
      private NewsModel $newsModel;

   public function __construct(Viewer $viewer, NewsModel $newsModel){
      $this->viewer = $viewer;
      // method one is use inside deal new appreach is  method 2 through dependency injection
      $this->newsModel = $newsModel;
   }
   public function deal(){
    // include the model role here to deal with the database
   // require_once "Model/NewsModel";
   //  require "Model/NewsModel.php";
   /*method 1: this is not a good approach to do it  comment it out
   $news_model = new NewsModel;
    $articles = $news_model->runQuery();
   */
   // method 2 through dependency injection
    
    
   //  print_r($articles);
    // here the role of modle is ended
    //the data is passed from controller to the view in this style as an array. In the viewer class;
    //that data is extracted, and hence it become available as variable to the view

   //  now in frame work we created a viewer class which is use for rendering the the view page
   $outputFromView =  $this->viewer->render("article_view",['articles' => $articles]);
   print $outputFromView;
   }
}