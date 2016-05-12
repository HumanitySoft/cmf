<?php
return function(){
  $accept = $_SERVER['HTTP_ACCEPT'];

  switch(substr($accept,0,6)){
    case "api://":
      $res = $this->exec(substr($accept,6),file_get_contents('php://input'));
      header('Content-Type: application/json');
      $res = json_encode($res);
      die($res);
    break;
    default:
      $this->view('pages');
  }

}
?>
