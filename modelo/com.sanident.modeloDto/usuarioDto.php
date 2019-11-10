<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarioDto
 *
 * @author carolyiset
 */
class usuarioDto {
    
    private $id = 0;
    private $estadousuarios = "";
    private $documento = "";
    private $nombres = "";
    private $apellidos = "";
    private $fechanacimiento = "";
    private $genero = "";
    private $telefonofijo = "";
    private $telefonomovil = "";
    private $correoelectronico = "";
    private $clave = "";
    private $ciudad = "";
    private $estadocivil = "";
    private $tipodocumento = "";
    
    
    function getNombres() {
        return $this->nombres;
    }

    function setNombres($nombres) {
        $this->nombres = $nombres;
    }

        function getTipodocumento() {
        return $this->tipodocumento;
    }

    function setTipodocumento($tipodocumento) {
        $this->tipodocumento = $tipodocumento;
    }

        
  

        function getId() {
        return $this->id;
    }

    function getEstadousuarios() {
        return $this->estadousuarios;
    }

    function getDocumento() {
        return $this->documento;
    }

    function getApellidos() {
        return $this->apellidos;
    }

 

    function getFechanacimiento() {
        return $this->fechanacimiento;
    }

    function getGenero() {
        return $this->genero;
    }

    function getTelefonofijo() {
        return $this->telefonofijo;
    }

    function getTelefonomovil() {
        return $this->telefonomovil;
    }

    function getCorreoelectronico() {
        return $this->correoelectronico;
    }

    function getClave() {
        return $this->clave;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getEstadocivil() {
        return $this->estadocivil;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEstadousuarios($estadousuarios) {
        $this->estadousuarios = $estadousuarios;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

  
    function setFechanacimiento($fechanacimiento) {
        $this->fechanacimiento = $fechanacimiento;
    }

    function setGenero($genero) {
        $this->genero = $genero;
    }

    function setTelefonofijo($telefonofijo) {
        $this->telefonofijo = $telefonofijo;
    }

    function setTelefonomovil($telefonomovil) {
        $this->telefonomovil = $telefonomovil;
    }

    function setCorreoelectronico($correoelectronico) {
        $this->correoelectronico = $correoelectronico;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setEstadocivil($estadocivil) {
        $this->estadocivil = $estadocivil;
    }


}
