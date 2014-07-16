<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        session_start();
        $this->load->model('ruta_model');
    }

    public function index() {
        $this->destruirSession();

        $data["rutas"] = $this->ruta_model->obtenerRutasOrdenadas();
//        $this->load->view('include/header');
        $this->load->view('inicio_view', $data);
//        $this->load->view('include/footer');
    }

    private function destruirSession() {
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }

}
