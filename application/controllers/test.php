<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class test extends CI_Controller {

    public function index() {
        $data["saludo"] = "Cordial saludo";
        $data["nombreAcudiente"] = "Señora Maria soledad";
        $data["parentesco"] = "hijo";
        $data["nombreEstudiante"] = "Luis Fernando Montoya Gómez";
        $data["textoDestino"] = "Casa";
        $data["textoAbordo"] = "";
        $data["nombreRuta"] = "Ruta 0016";
        $data["fecha"] = "18 de abril del 20014";
        $data["guiaNombres"] = "Juan";
        $data["guiaApellidos"] = "Salvador Gavita";
        $data["guiaCelular"] = "311 3727751";
        $data["email"] = "luismec90@gmail.com";
        $this->load->view('template/template_email', $data);
    }

}
