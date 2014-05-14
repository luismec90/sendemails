<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ruta extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        session_start();
        $this->estoyLogueado();
        $this->load->model('estudiante_model');
        $this->load->model('ruta_model');
    }

    public function index($ruta, $origen) {

        $origen = ($origen == "casa") ? "casa" : "colegio";
        $destino = ($origen == "casa") ? "colegio" : "casa";

        $data["tab"] = "ruta";
        $data["origen"] = $origen;
        $data["destino"] = $destino;
        $data["css"] = array("css/ruta", "libs/sortable/sortable-theme-bootstrap");
        $data["js"] = array("libs/jQuery-Autocomplete/src/jquery.autocomplete", "libs/sortable/sortable.min", "js/ruta");

        $data["estudiantes"] = $this->estudiante_model->obtenerEstudiantes($ruta, $destino);
        //var_dump($data["estudiantes"]);
        $data["ruta"] = $this->ruta_model->obtenerRuta(array("id" => $ruta));
        $this->load->view('include/header', $data);
        $this->load->view('ruta_view');
        $this->load->view('include/footer');
    }

    public function checkout($ruta, $origen) {
        $origen = ($origen == "casa") ? "casa" : "colegio";
        $destino = ($origen == "casa") ? "colegio" : "casa";

        $data["tab"] = "ruta";
        $data["origen"] = $origen;
        $data["destino"] = $destino;
        $data["css"] = array("css/checkout", "libs/sortable/sortable-theme-bootstrap");
        $data["js"] = array("libs/sortable/sortable.min", "js/checkout");

        $data["estudiantes"] = $this->estudiante_model->obtenerEstudiantesCheckout($ruta, $destino);
        //var_dump($data["estudiantes"]);
        $data["ruta"] = $this->ruta_model->obtenerRuta(array("id" => $ruta));
        $this->load->view('include/header', $data);
        $this->load->view('checkout_view');
        $this->load->view('include/footer');
    }

}
