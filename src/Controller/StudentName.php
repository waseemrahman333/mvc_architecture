<?php 
 
 namespace App\Controller;
 use Framework\viewer;

 class StudentName{
    private Viewer $viewer;

    public function __construct(Viewer $viewer){
     $this->viewer = $viewer;
    }

    public function displayName($id)
    {
       
      print $this->viewer->render("partials/header" , ["title" => "Student Name"]);
    
      print  $this->viewer->render("StudentName/name" , ["id" => $id]);
      print  $this->viewer->render("partials/footer" ,);
    }
 }