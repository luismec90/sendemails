<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Entrar extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        session_start();
        $this->load->model('usuario_model');
    }

    public function index() {

        $usuario = $this->input->post("username");
        $password = $this->input->post("password");
        $ruta = $this->input->post("ruta");
        $origen = $this->input->post("origen");
        $data = array(
            'usuario' => $usuario,
            'password' => sha1($password),
            'rol' => 'usuario'
        );

        $usuario = $this->usuario_model->obtenerUsuario($data); //pasamos los valores al modelo para que compruebe si existe el usuario
        if ($usuario) {
            $_SESSION["idUsuario"] = $usuario[0]->id;
            $_SESSION["nombre"] = $usuario[0]->nombres . " " . $usuario[0]->apellidos;
            $_SESSION["rol"] = $usuario[0]->usuario;
            redirect(base_url() . "ruta/$ruta/$origen");
        } else {
            $this->mensaje("Usuario o contraseña incorrectos", "error");
        }
    }

    public function admin() {
        $usuario = $this->input->post("username");
        $password = $this->input->post("password");
        $data = array(
            'usuario' => $usuario,
            'password' => sha1($password),
            'rol' => 'admin'
        );
        $usuario = $this->usuario_model->obtenerUsuario($data); //pasamos los valores al modelo para que compruebe si existe el usuario 
        if ($usuario) {
            $_SESSION["idUsuario"] = $usuario[0]->id;
            $_SESSION["nombre"] = $usuario[0]->nombres . " " . $usuario[0]->apellidos;
            $_SESSION["rol"] = $usuario[0]->rol;
            redirect(base_url() . "conductores");
        } else {
            $this->mensaje("Usuario o contraseña incorrectos", "error", "admin");
        }
    }

}
