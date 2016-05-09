<?php
return function(){
  $conf = self::$conf;
  $path = $this->path($_SERVER['HTTP_REFERER']);
  if(!isset($conf[$path])) return '';
  $css = [];
  foreach($conf[$path] as $i=>$v){
    $file = self::$dir.'/../css/'.$v.'.css';
    if(is_file($file)) $css[] = file_get_contents($file);
  }
  $css = implode('',$css);
  return $css;
}
?>
