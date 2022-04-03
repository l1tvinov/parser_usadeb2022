<?php

namespace app\ParserUsadeb;

class Lot {
  private $name;
  private $path;
  private $area = 1000;
  private $type = 'open';

  public function __construct($name, $area) {
    $this->name = $name;
    $this->area = $area;
  }
  
  public function SetName ($name) {
    $this->name = $name;
  }  
  public function SetPath ($path) {
    $this->path = $path;
  }  
  public function SetArea ($area) {
    $this->area = $area;
  }  
  public function SetType ($type) {
    $this->type = $type;
  }

  
  public function GetName () {
    return $this->name;
  }  
  public function GetPath () {
    return $this->path;
  }  
  public function GetArea () {
    return $this->area;
  }  
  public function GetType () {
    return $this->type;
  }

  public function GetResObj() {
    return "  " . $this->name . " : {" . "<br>"
      ."	"."	name: '". $this->name ."'," . "<br>"
      ."	"."	path: '" . $this->path . "'," . "<br>"
      ."	"."	type: '" . $this->type . "'," . "<br>"
      ."	"."area: '" . $this->area . "'" . "<br>"
      ."}," . "<br>";
  }
}