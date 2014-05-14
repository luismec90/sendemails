<?php

class Auditoria_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function crearRegistro($data) {
        $this->db->insert('auditoria', $data);
        return $this->db->insert_id();
    }

}
