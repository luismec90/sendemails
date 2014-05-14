<?php

class Asunto_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function obtenerAsuntos() {
        $this->db->from('asunto');
        $this->db->order_by("asunto", "asc");
        return $this->db->get()->result();
    }

}
