<?php
function __autoload($className){
  require_once 'clases/'.strtolower($className).'.php';
  require_once 'dbfunctions.php';
}
// Agrega un usuario a un recorrido

$datos = array('usuario_id' => $_POST['usuario'], 'evento_id' => $_POST['evento']);
execute_insert('usuario_evento',$datos);  

?>