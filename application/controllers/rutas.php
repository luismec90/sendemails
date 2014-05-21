<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rutas extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        session_start();
        $this->soyAdmin();
        $this->load->model('conductor_model');
        $this->load->model('ruta_model');
    }

    public function index() {
        $this->escapar($_GET);
        $data["tab"] = "rutas";
        $data["conductores"] = $this->conductor_model->obtenerConductores();
        $data["rutas"] = $this->ruta_model->obtenerRutas($_GET);
        $data["css"] = array("libs/jQuery-ui-1.10.4/css/smoothness/jquery-ui-1.10.4.custom.min");
        $data["js"] = array("libs/jQuery-ui-1.10.4/js/jquery-ui-1.10.4.custom.min", "js/admin/rutas");

        $this->load->view('include/header', $data);
        $this->load->view('admin/rutas_view');
        $this->load->view('include/footer');
    }

    public function crear() {
        $conductor = $this->input->post("conductor");
        $nombre = $this->input->post("nombre");
        $bus = $this->input->post("bus");
        $capacidad = $this->input->post("capacidad");
        if (!$conductor || !$nombre || !$bus || !$capacidad) {
            $this->mensaje("Datos inválidos", "error", "rutas");
        }
        $data = array("id_conductor" => $conductor,
            "nombre" => $nombre,
            "bus" => $bus,
            "capacidad" => $capacidad);
        $this->ruta_model->crear($data);
        $this->mensaje("Ruta creada exitosamente", "success", "rutas");
    }

    public function editar() {
        $idRuta = $this->input->post("idRuta");
        $conductor = $this->input->post("conductor");
        $nombre = $this->input->post("nombre");
        $bus = $this->input->post("bus");
        $capacidad = $this->input->post("capacidad");
        if (!$idRuta || !$conductor || !$nombre || !$bus || !$capacidad) {
            $this->mensaje("Datos inválidos", "error", "rutas");
        }
        $data = array("id_conductor" => $conductor,
            "nombre" => $nombre,
            "bus" => $bus,
            "capacidad" => $capacidad);
        $where = array("id" => $idRuta);
        $this->ruta_model->actualizar($data, $where);
        $this->mensaje("Ruta actualizada exitosamente", "success", "rutas");
    }

    public function eliminar() {
        $this->load->model('estudiante_model');
        $idRuta = $this->input->post("idRuta");
        if (!$idRuta) {
            $this->mensaje("Datos inválidos", "error", "rutas");
        }
        $estudiantes = $this->estudiante_model->obtenerRegistro(array("id_ruta" => $idRuta));
        if ($estudiantes) {
            $this->mensaje("Primero debe eliminar todos los estudiantes asociados a esta ruta", "error", "rutas");
        }
        $where = array("id" => $idRuta);
        $this->ruta_model->eliminar($where);
        $this->mensaje("Ruta eliminada exitosamente", "success", "rutas");
    }

}
