<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ciudadDto
 *
 * @author carolyiset
 */
class ciudadDto {
    
  private $id = 0;
  private $nombre = "";
  
  function getId() {
      return $this->id;
  }

  function getNombre() {
      return $this->nombre;
  }

  function setId($id) {
      $this->id = $id;
  }

  function setNombre($nombre) {
      $this->nombre = $nombre;
  }



}
