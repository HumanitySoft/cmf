<?php
return function($name){
  $file = self::$dir.'/../widget/'.$name.'.phtml';
  if(!is_file($file)) return '';
  else require($file);
}
?>
