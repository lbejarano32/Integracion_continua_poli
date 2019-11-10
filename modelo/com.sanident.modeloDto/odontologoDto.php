<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of odontologoDto
 *
 * @author carolyiset
 */
class odontologoDto {
   private $id = 0;
   private $tarjetaProfesional = "";
   private $especialidad = "";
   
   function getId() {
       return $this->id;
   }

   function getTarjetaProfesional() {
       return $this->tarjetaProfesional;
   }

   function getEspecialidad() {
       return $this->especialidad;
   }

   function setId($id) {
       $this->id = $id;
   }

   function setTarjetaProfesional($tarjetaProfesional) {
       $this->tarjetaProfesional = $tarjetaProfesional;
   }

   function setEspecialidad($especialidad) {
       $this->especialidad = $especialidad;
   }


}
