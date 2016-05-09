<?php
return function($method,$json=null){
  $data = json_decode($json,true);
  $file = self::$dir.'/'.$method.'.php';
  if(!is_file($file)) return false;
  $function = require($file);
  if(!is_callable($function)) return [];
  $reflection = new \ReflectionFunction($function);
  $params = [];
  foreach($reflection->getParameters() as $key=>$value){
    $params[] = $value->name;
  }
  $app = new self;
  $method = explode('/',$method);
  $count = count($method);
  for($i=$count;$i > 0;$i--){
    $name = array_shift($method); 
    if($i == 1) $app = call_user_method_array($name,$app,$params);
    else $app = $app->{$name};
  }
  return $app;
}
?>
