<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        session_start();
    }

    public function index() {
        $this->destruirSession();

        $this->load->view('admin_view');
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
