<?php
/* Class: Hito */
/* Representa los hitos. Hito: Hito de un solo lugar */
  
class Hito
{  
  var $id = null;
  var $nombre;
  var $descripcion;
  var $imagen;
  var $coordenadas;
  var $columnasmodificadas = array();
  
  
  // Constructor
  
  function __construct($id = null) {
    if($id) {
      $ellugar = execute_select('lugar', array('*'),'id = '.$id);
      $lugar = $ellugar[0];
      $this->id = $id;
      $this->nombre = $lugar[$this->nombrecolumna('nombre')];
      $this->descripcion = $lugar[$this->nombrecolumna('descripcion')];
      $this->imagen = $lugar[$this->nombrecolumna('imagen')];
      $this->coordenadas = $lugar[$this->nombrecolumna('coordenadas')];
    }
  }
  
  // Getters
  
  public function getId() {
    return $this->id;
  }
  
  public function getNombre() {
    return $this->nombre;
  }
  
  public function getDescripcion() {
    return $this->descripcion;
  }
  
  public function getImagen() {
    return $this->imagen;
  }
  
  public function getCoordenadas() {
    return $this->coordenadas;
  }
  
  // Setters
  
  public function setNombre($nuevonombre) {
    $this->nombre = $nuevonombre;
    array_push($this->columnasmodificadas, 'nombre');
  }
  
  public function setDescripcion($nuevadescripcion) {
    $this->descripcion = $nuevadescripcion;
    array_push($this->columnasmodificadas, 'descripcion');
  }
  
  public function setImagen($nuevaimagen) {
    $this->imagen = $nuevaimagen;
    array_push($this->columnasmodificadas, 'imagen');
  } 

  public function setCoordenadas($nuevascoordenadas) {
    $this->coordenadas = $nuevascoordenadas;
    array_push($this->columnasmodificadas, 'coordenadas');
  } 
  // Funciones respecto a otros objetos
  
  public function agregarCategoria($categoria) {
    if (!isset($this->id)) {
      $this->save();
    }
    $datos = array('categoria' => $categoria, 'Hito_id' => $this->id);
    execute_insert('Lugar_categoria_rubro',$datos);    
  }
  
  public function agregarRubro($rubro) {
    if (!isset($this->id)) {
      $this->save();
    }
    $datos = array('rubro' => $rubro, 'Hito_id' => $this->id);
    execute_insert('Lugar_categoria_rubro',$datos);    
  } 
  
  public function agregarMedia($tipo,$descripcion,$url) {
    if (!isset($this->id)) {
      $this->save();
    }
    $datos = array('tipo' => $tipo, 'descripcion' => $descripcion, 'url' => $url, 'Hito_id' => $this->id);
    execute_insert('Lugar_media',$datos);    
  }
  
  // Funciones
  
  private function nombrecolumna($nombre) {
    switch ($nombre) {
      default:
        return $nombre;
    }
  }  
  
  public function save() {
    if (isset($this->id)) {
      $existe = (count(execute_select('lugar', array('id'),'id = '.$this->id)) > 0)? true : false;
    } else {
      $existe = false;
    }
    $datos = array();
    foreach($this->columnasmodificadas as $columna) {
      $nombrecolumna = $this->nombrecolumna($columna);
      $datos[$nombrecolumna] = $this->$columna; 
    }
    if($existe) {
      execute_update('lugar', $datos,'id = '.$this->id);
    } else {
      $result_insert = execute_insert('lugar', $datos);
      $this->id = $result_insert;      
    }

  }
  

  
}
?>