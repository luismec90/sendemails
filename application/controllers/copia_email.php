<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Copia_email extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        session_start();
        $this->soyAdmin();
        $this->load->model('copia_email_model');
    }

    public function index() {
        $data["tab"] = "copia_email";
        $data["js"] = array("js/admin/copia_email");
        $data["emails"] = $this->copia_email_model->obtenerregistros();

        $this->load->view('include/header', $data);
        $this->load->view('admin/copia_email_view');
        $this->load->view('include/footer');
    }

    public function crear() {
        $email = $this->input->post("email");
        if (!$email) {
            $this->mensaje("Datos inválidos", "error", "copia_email");
        }
        $data = array("email" => $email);
        $this->copia_email_model->crear($data);
        $this->mensaje("E-mail creado exitosamente", "success", "copia_email");
    }

    public function editar() {
        $idEmail = $this->input->post("idEmail");
        $email = $this->input->post("email");
        if (!$idEmail || !$email) {
            $this->mensaje("Datos inválidos", "error", "copia_email");
        }
        $data = array("email" => $email);
        $where = array("id" => $idEmail);
        $this->copia_email_model->actualizar($data, $where);
        $this->mensaje("E-mail editado exitosamente", "success", "copia_email");
    }

    public function eliminar() {
        $idEmail = $this->input->post("idEmail");
        if (!$idEmail) {
            $this->mensaje("Datos inválidos", "error", "copia_email");
        }
        $where = array("id" => $idEmail);
        $this->copia_email_model->eliminar($where);
        $this->mensaje("E-mail eliminado exitosamente", "success", "copia_email");
    }

}
