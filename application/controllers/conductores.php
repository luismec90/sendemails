<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Conductores extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        session_start();
        $this->soyAdmin();
        $this->load->model('conductor_model');
    }

    public function index() {
        $this->escapar($_GET);
        $data["tab"] = "conductores";
        $data["conductores"] = $this->conductor_model->obtenerConductores($_GET);
        $data["css"] = array("libs/jQuery-ui-1.10.4/css/smoothness/jquery-ui-1.10.4.custom.min");
        $data["js"] = array("libs/jQuery-ui-1.10.4/js/jquery-ui-1.10.4.custom.min", "js/admin/conductores");

        $this->load->view('include/header', $data);
        $this->load->view('admin/conductores_view');
        $this->load->view('include/footer');
    }

    public function crear() {
        $nombres = $this->input->post("nombres");
        $apellidos = $this->input->post("apellidos");
        $cedula = $this->input->post("cedula");
        $sexo = $this->input->post("sexo");
        $fechaNacimiento = $this->input->post("fechaNacimiento");
        $telefono = $this->input->post("telefono");
        $celular = $this->input->post("celular");
        $email = $this->input->post("email");
        if (!$nombres || !$apellidos || !$cedula || !$sexo || ($sexo != "femenino" && $sexo != "masculino")) {
            $this->mensaje("Datos inválidos", "error", "conductores");
        }
        $data = array("nombres" => $nombres,
            "apellidos" => $apellidos,
            "cedula" => $cedula,
            "sexo" => $sexo,
            "fecha_nacimiento" => $fechaNacimiento,
            "telefono_casa" => $telefono,
            "celular" => $celular,
            "email" => $email);
        $this->conductor_model->crear($data);
        $this->mensaje("Conductor creado exitosamente", "success", "conductores");
    }

    public function editar() {
        $idConductor = $this->input->post("idConductor");
        $nombres = $this->input->post("nombres");
        $apellidos = $this->input->post("apellidos");
        $cedula = $this->input->post("cedula");
        $sexo = $this->input->post("sexo");
        $fechaNacimiento = $this->input->post("fechaNacimiento");
        $telefono = $this->input->post("telefono");
        $celular = $this->input->post("celular");
        $email = $this->input->post("email");
        if (!$idConductor || !$nombres || !$apellidos || !$cedula || !$sexo || ($sexo != "femenino" && $sexo != "masculino")) {
            $this->mensaje("Datos inválidos", "error", "conductores");
        }
        $data = array("nombres" => $nombres,
            "apellidos" => $apellidos,
            "cedula" => $cedula,
            "sexo" => $sexo,
            "fecha_nacimiento" => $fechaNacimiento,
            "telefono_casa" => $telefono,
            "celular" => $celular,
            "email" => $email);
        $where = array("id" => $idConductor);
        $this->conductor_model->actualizar($data, $where);
        $this->mensaje("Conductor actualizado exitosamente", "success", "conductores");
    }

    public function eliminar() {
        $idConductor = $this->input->post("idConductor");
        if (!$idConductor) {
            $this->mensaje("Datos inválidos", "error", "conductores");
        }
        $where = array("id" => $idConductor);
        $this->conductor_model->eliminar($where);
        $this->mensaje("Conductor eliminado exitosamente", "success", "conductores");
    }

}
