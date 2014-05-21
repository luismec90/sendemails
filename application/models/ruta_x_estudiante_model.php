<?php

class Ruta_x_estudiante_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function obtenerRegistro($where) {
        return $this->db->get_where('ruta_x_estudiante', $where)->result();
    }

    public function crear($data) {
        $this->db->insert('ruta_x_estudiante', $data);
    }

    public function actualizar($data, $where) {
        $this->db->update('ruta_x_estudiante', $data, $where);
    }

    public function eliminar($where) {
        $this->db->delete('ruta_x_estudiante', $where);
    }

}
