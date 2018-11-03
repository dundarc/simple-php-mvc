<?php

class database{
  public $host=   host;
  public $dbuser= dbuser;
  public $dbpass= dbpass;
  public $dbname= dbname;

  public $connect;


  public function __construct(){
    return $this->connect=mysqli_connect($this->host,$this->dbuser,$this->dbpass,$this->dbname);
  }
  public function query($a=""){
    return mysqli_query($this->connect,$a);
  }
  public function fetch($a){
    return mysqli_fetch_array($this->query($a));
  }
  public function fetch_element($a,$element){
    $fetch=mysqli_fetch_array($this->query($a));
    return $fetch[$element];
  }

}

 ?>
