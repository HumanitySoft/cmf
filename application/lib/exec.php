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
    if(isset($data[$value->name])) $params[] = $data[$value->name];
    else $params[] = null;
  }
  $app = new self;
  $method = explode('/',$method);
  $count = count($method);
  for($i=$count;$i > 0;$i--){
    $name = array_shift($method); 
    if($i == 1) $app = call_user_func_array([$app,$name],$params);
    else $app = $app->{$name};
  }
  return $app;
}
?>
