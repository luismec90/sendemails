<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Historico extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        session_start();
        $this->soyAdmin();
        $this->load->model('historico_model');
    }

    public function index() {
        $this->escapar($_GET);
        $data["tab"] = "historico";

        $filasPorPagina = 20;
        if (empty($_GET["page"])) {
            $inicio = 0;
            $paginaActual = 1;
        } else {
            $inicio = ($_GET["page"] - 1) * $filasPorPagina;
            $paginaActual = $_GET["page"];
        }
        $data["historico"] = $this->historico_model->obtenerRegistros($_GET, $filasPorPagina, $inicio);
        $data['paginaActiva'] = $paginaActual;
        $data["cantidadRegistros"] = $this->historico_model->cantidadRegistros($_GET);
        $data["cantidadRegistros"] = $data["cantidadRegistros"][0]->cantidad;
        $data["filasPorPagina"] = $filasPorPagina;
        $data['cantidadPaginas'] = ceil($data["cantidadRegistros"] / $filasPorPagina);
        
        $data["css"] = array("libs/jQuery-ui-1.10.4/css/smoothness/jquery-ui-1.10.4.custom.min");
        $data["js"] = array("libs/jQuery-ui-1.10.4/js/jquery-ui-1.10.4.custom.min", "js/admin/historico");

        $this->load->view('include/header', $data);
        $this->load->view('admin/historico_view');
        $this->load->view('include/footer');
    }

}
