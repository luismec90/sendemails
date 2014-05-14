<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Acudientes extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        session_start();
        $this->soyAdmin();
        $this->load->model('ruta_model');
        $this->load->model('acudiente_model');
    }

    public function index() {
        $this->escapar($_GET);
        $data["tab"] = "acudientes";
        $data["rutas"] = $this->ruta_model->obtenerRutas();
        $filasPorPagina = 20;
        if (empty($_GET["page"])) {
            $inicio = 0;
            $paginaActual = 1;
        } else {
            $inicio = ($_GET["page"] - 1) * $filasPorPagina;
            $paginaActual = $_GET["page"];
        }

        $data["acudientes"] = $this->acudiente_model->obtenerTodosLosAcudientes($_GET, $filasPorPagina, $inicio);
        $data['paginaActiva'] = $paginaActual;
        $data["cantidadRegistros"] = $this->acudiente_model->cantidadRegistros();
        $data["cantidadRegistros"] = $data["cantidadRegistros"][0]->cantidad;
        $data["filasPorPagina"] = $filasPorPagina;
        $data['cantidadPaginas'] = ceil($data["cantidadRegistros"] / $filasPorPagina);
        
        $data["js"] = array("js/admin/acudientes");
        $this->load->view('include/header', $data);
        $this->load->view('admin/acudientes_view');
        $this->load->view('include/footer');
    }

    public function crear() {
        $nombres = $this->input->post("nombres");
        $apellidos = $this->input->post("apellidos");
        $sexo = $this->input->post("sexo");
        $email = $this->input->post("email");
        $telefono1 = $this->input->post("telefono1");
        $telefono2 = $this->input->post("telefono2");
        $telefono3 = $this->input->post("telefono3");
        $direccionDomocilio = $this->input->post("direccionDomocilio");
        $direccionLaboral = $this->input->post("direccionLaboral");
        $recibirEmails = ($this->input->post("envioEmails") == "1") ? "1" : "0";
        if (!$nombres || !$apellidos || !$sexo || ($sexo != "femenino" && $sexo != "masculino") || !$email || !$telefono1) {
            $this->mensaje("Datos inválidos", "error", "acudientes");
        }
        $data = array("nombres" => $nombres,
            "apellidos" => $apellidos,
            "sexo" => $sexo,
            "email" => $email,
            "telefono1" => $telefono1,
            "telefono2" => $telefono2,
            "telefono3" => $telefono3,
            "direccion_casa" => $direccionDomocilio,
            "direccion_oficina" => $direccionLaboral,
            "recibir_emails" => $recibirEmails
        );
        $this->acudiente_model->crear($data);
        $this->mensaje("Acudiente creado exitosamente", "success", "acudientes");
    }

    public function editar() {
        $idAcudiente = $this->input->post("idAcudiente");
        $nombres = $this->input->post("nombres");
        $apellidos = $this->input->post("apellidos");
        $sexo = $this->input->post("sexo");
        $email = $this->input->post("email");
        $telefono1 = $this->input->post("telefono1");
        $telefono2 = $this->input->post("telefono2");
        $telefono3 = $this->input->post("telefono3");
        $direccionDomocilio = $this->input->post("direccionDomocilio");
        $direccionLaboral = $this->input->post("direccionLaboral");
        $recibirEmails = ($this->input->post("envioEmails") == "1") ? "1" : "0";
        if (!$nombres || !$apellidos || !$sexo || ($sexo != "femenino" && $sexo != "masculino") || !$email || !$telefono1) {
            $this->mensaje("Datos inválidos", "error", "acudientes");
        }
        $data = array("nombres" => $nombres,
            "apellidos" => $apellidos,
            "sexo" => $sexo,
            "email" => $email,
            "telefono1" => $telefono1,
            "telefono2" => $telefono2,
            "telefono3" => $telefono3,
            "direccion_casa" => $direccionDomocilio,
            "direccion_oficina" => $direccionLaboral,
            "recibir_emails" => $recibirEmails
        );
        $where = array("id" => $idAcudiente);
        $this->acudiente_model->actualizar($data, $where);
        $this->mensaje("Acudiente actualizado exitosamente", "success", "acudientes");
    }

    public function eliminar() {
        $idAcudiente = $this->input->post("idAcudiente");
        if (!$idAcudiente) {
            $this->mensaje("Datos inválidos", "error", "acudientes");
        }
        $where = array("id" => $idAcudiente);
        $this->acudiente_model->eliminar($where);
        $this->mensaje("Acudiente eliminado exitosamente", "success", "acudientes");
    }

}
