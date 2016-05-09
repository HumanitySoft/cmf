<?php
return function($name){
  $path = $this->path('//'.$_SERVER['HTTP_HOST'].'/'.$_SERVER['REQUEST_URI']);
  $file = self::$dir.'/../view/'.$name.'/'.$path.'.phtml';
  if(!is_file($file)) http_response_code(404);
  else require($file);
}
?>
