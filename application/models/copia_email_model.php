<?php

class Copia_email_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function obtenerRegistros() {
        $this->db->from('copia_email');
        $this->db->order_by("email", "asc");
        return $this->db->get()->result();
    }

    public function crear($data) {
        $this->db->insert('copia_email', $data);
    }

    public function actualizar($data, $where) {
        $this->db->update('copia_email', $data, $where);
    }

    public function eliminar($where) {
        $this->db->delete('copia_email', $where);
    }

}
