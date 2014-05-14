<?php

class Estudiante_x_acudiente_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function crear($data) {
        $this->db->insert('estudiante_x_acudiente', $data);
    }

    public function eliminar($where) {
        $this->db->delete('estudiante_x_acudiente', $where);
    }

}
