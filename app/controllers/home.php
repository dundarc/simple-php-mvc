<?php
class home extends Controller{
  public function index(){
    $page=$this->model("publicUser");
    
    $this->view("home/index");

  }
}


 ?>
