<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Unsubscribe extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model('acudiente_model');
    }

    public function index() {

        $data = array();
        $data["tab"] = "index";
        $data["css"] = array("css/unsubscribe");
        $data["email"] = $this->input->get('email');
        $data["token"] = $this->input->get('token');
        $data["acudiente"] = $this->acudiente_model->obtenerAcudiente(array("email" => $data["email"]));
        $this->load->view('unsubscribe_view', $data);
    }

    public function make() {
        $data = array();
        $data["tab"] = "make";
        $data["email"] = $this->input->get('email');
        $data["token"] = $this->input->get('token');
        if ($data["token"] == sha1("{$data["email"]}-nationaltourskey")) {
            $this->acudiente_model->unsubscribe($data["email"]);
        } else {
            show_404();
        }

        $data["css"] = array("css/unsubscribe");
        $this->load->view('unsubscribe_view', $data);
    }

}
