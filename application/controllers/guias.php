<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Guias extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        session_start();
        $this->soyAdmin();
        $this->load->model('usuario_model');
    }

    public function index() {
        $this->escapar($_GET);
        $data["tab"] = "guias";
        $data["guias"] = $this->usuario_model->obtenerGuias($_GET);
        $data["css"] = array("libs/jQuery-ui-1.10.4/css/smoothness/jquery-ui-1.10.4.custom.min");
        $data["js"] = array("libs/jQuery-ui-1.10.4/js/jquery-ui-1.10.4.custom.min", "js/admin/guias");

        $this->load->view('include/header', $data);
        $this->load->view('admin/guias_view');
        $this->load->view('include/footer');
    }

    public function crear() {
        $nombres = $this->input->post("nombres");
        $apellidos = $this->input->post("apellidos");
        $sexo = $this->input->post("sexo");
        $fechaNacimiento = $this->input->post("fechaNacimiento");
        $usuario = $this->input->post("usuario");
        $password = $this->input->post("password");
        $celular = $this->input->post("celular");
        $email = $this->input->post("email");
        if (!$nombres || !$apellidos || !$sexo || ($sexo != "femenino" && $sexo != "masculino") || !$usuario || !$password || !$celular || !$email) {
            $this->mensaje("Datos inválidos", "error", "guias");
        }
        $existe = $this->usuario_model->obtenerUsuario(array("usuario" => $usuario));
        if ($existe) {
            $this->mensaje("El usuario: $usuario ya existe", "error", "guias");
        }
        if (strlen($password) < 4) {
            $this->mensaje("la contraseña debe tener al menos 5 caracteres", "error", "guias");
        }
        $data = array("nombres" => $nombres,
            "apellidos" => $apellidos,
            "sexo" => $sexo,
            "fecha_nacimiento" => $fechaNacimiento,
            "usuario" => $usuario,
            "password" => sha1($password),
            "celular" => $celular,
            "email" => $email,
            "rol" => "usuario");
        if ($fechaNacimiento == "") {
            unset($data["fecha_nacimiento"]);
        }
        $this->usuario_model->crear($data);
        $this->mensaje("Guía creada exitosamente", "success", "guias");
    }

    public function editar() {
        $idUsuario = $this->input->post("idGuia");
        $nombres = $this->input->post("nombres");
        $apellidos = $this->input->post("apellidos");
        $sexo = $this->input->post("sexo");
        $fechaNacimiento = $this->input->post("fechaNacimiento");
        $usuario = $this->input->post("usuario");
        $password = $this->input->post("password");
        $celular = $this->input->post("celular");
        $email = $this->input->post("email");
        if (!$idUsuario || !$nombres || !$apellidos || !$sexo || ($sexo != "femenino" && $sexo != "masculino") || !$usuario || !$celular || !$email) {
            $this->mensaje("Datos inválidos", "error", "guias");
        }
        if ($password) {
            if (strlen($password) < 4) {
                $this->mensaje("la contraseña debe tener al menos 5 caracteres", "error", "guias");
            }
            $data = array("nombres" => $nombres,
                "apellidos" => $apellidos,
                "sexo" => $sexo,
                "fecha_nacimiento" => $fechaNacimiento,
                "usuario" => $usuario,
                "password" => sha1($password),
                "celular" => $celular,
                "email" => $email,
                "rol" => "usuario");
        } else {
            $data = array("nombres" => $nombres,
                "apellidos" => $apellidos,
                "sexo" => $sexo,
                "fecha_nacimiento" => $fechaNacimiento,
                "usuario" => $usuario,
                "celular" => $celular,
                "email" => $email,
                "rol" => "usuario");
        }
        if ($fechaNacimiento == "") {
            unset($data["fecha_nacimiento"]);
        }
        $where = array("id" => $idUsuario);
        $this->usuario_model->actualizar($data, $where);
        $this->mensaje("Guía actualizada exitosamente", "success", "guias");
    }

    public function eliminar() {
        $idUsuario = $this->input->post("idGuia");
        if (!$idUsuario) {
            $this->mensaje("Datos inválidos", "error", "guias");
        }
        $where = array("id" => $idUsuario);
        $this->usuario_model->eliminar($where);
        $this->mensaje("Guía eliminada exitosamente", "success", "guias");
    }

}
