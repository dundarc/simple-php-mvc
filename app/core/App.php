<?php
 class App{
   protected $controller='home';
   protected $method='index';
   protected $params=[];

   public function __construct(){
     $url=$this->parseURL();
     $controller="../app/controllers/".$url[0].".php";

     // URL CONTROLLER SİSTEMİ
     if(file_exists($controller)){
       $this->controller=$url[0];
       unset($url[0]);

     }else{
       //404 controller

     }
     include "../app/controllers/".$this->controller.".php";
     $this->controller= new $this->controller();

     //URL SEGMENT 2
     if(isset($url[1])){
       if(method_exists($this->controller,$url[1])){
         $this->method=$url[1];
         unset($url[1]);
       }else{
         //method bulunamadı
       }
     }
     $this->params= $url?array_values($url):[];
     call_user_func_array([$this->controller,$this->method],$this->params);
   }
   public function parseURL(){
     if(isset($_GET['url'])){
       return explode("/",filter_var(rtrim($_GET['url'],"/"),FILTER_SANITIZE_URL));
     }
   }
 }
