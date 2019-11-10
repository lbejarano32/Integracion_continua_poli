<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of citaDto
 *
 * @author carolyiset
 */
class citaDto {
    
    private $id = 0;
    private $paciente = "";
    private $doctor = "";
    private $estadocita = "";
    private $fecha = "";
    private $hora = "";
    private $especialidad = "";
    
    function getEspecialidad() {
        return $this->especialidad;
    }

    function setEspecialidad($especialidad) {
        $this->especialidad = $especialidad;
    }

       
    
    function getHora() {
        return $this->hora;
    }

    

    function setHora($hora) {
        $this->hora = $hora;
    }


        
    function getId() {
        return $this->id;
    }

    function getPaciente() {
        return $this->paciente;
    }

    function getDoctor() {
        return $this->doctor;
    }

    function getEstadocita() {
        return $this->estadocita;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPaciente($paciente) {
        $this->paciente = $paciente;
    }

    function setDoctor($doctor) {
        $this->doctor = $doctor;
    }

    function setEstadocita($estadocita) {
        $this->estadocita = $estadocita;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }


}
