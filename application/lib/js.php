<?php
return function(){
  $conf = self::$conf;
  $path = $this->path($_SERVER['HTTP_REFERER']);
  if(!isset($conf[$path])) return '';
  $js = [];
  foreach($conf[$path] as $i=>$v){
    $file = self::$dir.'/../js/'.$v.'.js';
    if(is_file($file)) $js[] = file_get_contents($file);
  }
  $js = implode('',$js);
  return $js;
}
?>
