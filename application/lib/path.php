<?php
return function($url){
  $req = parse_url($url);
  $path = $req['path'];
  $path = explode('/',$path);
  foreach($path as $i=>$v){
    $v = trim($v);
    if(empty($v)) unset($path[$i]);
  }
  $path = implode('/',$path);
  if(empty($path)) $path = 'index';
  return $path;
}
?>
