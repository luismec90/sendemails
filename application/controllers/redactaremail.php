<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Redactaremail extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        session_start();
        $this->load->model('ruta_model');
        $this->load->model('asunto_model');
    }

    public function index($ruta, $origen) {


        $origen = ($origen == "casa") ? "casa" : "colegio";
        $destino = ($origen == "casa") ? "colegio" : "casa";

        $data["tab"] = "redactaremail";
        $data["origen"] = $origen;
        $data["destino"] = $destino;
        $data["buses"] = $this->ruta_model->obtenerBuses();
        $data["css"] = array("css/redactaremail");
        $data["js"] = array("libs/jQuery-Autocomplete/src/jquery.autocomplete", "js/redactaremail");



        $data["ruta"] = $this->ruta_model->obtenerRuta(array("id" => $ruta));
        $data["asuntos"] = $this->asunto_model->obtenerAsuntos();
        $this->load->view('include/header', $data);
        $this->load->view('redactaremail_view');
        $this->load->view('include/footer');
    }

}
