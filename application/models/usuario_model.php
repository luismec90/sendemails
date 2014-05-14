<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function obtenerUsuario($data) {
        $query = $this->db->get_where('usuario', $data);
        return $query->result();
    }

   

}
