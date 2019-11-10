<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pacienteDto
 *
 * @author carolyiset
 */
class pacienteDto {

    private $id = 0;
    private $tipoafiliacion = "";
    private $eps = "";
    private $rh = "";
    
           
    function getId() {
        return $this->id;
    }


    function getTipoafiliacion() {
        return $this->tipoafiliacion;
    }

    function getEps() {
        return $this->eps;
    }

    function getRh() {
        return $this->rh;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTipoafiliacion($tipoafiliacion) {
        $this->tipoafiliacion = $tipoafiliacion;
    }

    function setEps($eps) {
        $this->eps = $eps;
    }

    function setRh($rh) {
        $this->rh = $rh;
    }


}
