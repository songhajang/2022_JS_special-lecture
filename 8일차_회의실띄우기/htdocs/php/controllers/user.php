<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class User {

  public function index(){
    echo '<h1>123123</h1>';
  }

  /**
   * 
   */
  public function GET($params=null){
    echo json_encode($params);
  }

  /**
   * 
   */
  public function POST($params=null){
    echo json_encode($params);
  }

  /**
   * 
   */
  public function PUT($params=null){
      echo json_encode($params);
  }

  /**
   * 
   */
  public function DELETE($params=null){
    echo json_encode($params);
  }
}
?>