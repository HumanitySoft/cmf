<?php
return function(){
  $accept = $_SERVER['HTTP_ACCEPT'];

  switch(substr($accept,0,6)){
    case "api://":
      $this->exec(substr($accept,6),file_get_contents('php://input'));
    break;
    default:
      $this->view('pages');
  }

}
?>
