<?php 
namespace App\Controller;
use App\Model\ArticlesModel;
use Framework\Viewer;
class ArticlesController {
   // private Viewer $viewer;
   // private ArticlesModel $articleModel;
   // 
   public function __construct(private Viewer $viewer, private ArticlesModel $articlesModel){
   //  $this->viewer = $viewer;
   //  $this->articleModel = $articleModel;
   }
   public function deal(){
   // previously we initiaze object articlemodel class here and then run the query method on it but 
   // now we are calling the function through dependency injection and passing the obj of it through constructor 
   // then pass the output of the method to the veiwer class render method as and second argument through array
      $allArticles = $this->articlesModel->runQuery();
      
     // the output of viewer is store in a variable and then print it because of the ob_get_clean()
     // which actually return he output of the view file. 
   /* $viewarticle = $this->viewer->render("article_view" , ["allArticles" => $allArticles] );
   //  print $viewarticle;*/
   // we can also use the above like the below statement because print can show the return value as well.
     print $this->viewer->render("article_view" , ["allArticles" => $allArticles] );
   }
}