<?php

class Auditoria_x_acudiente_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function crearRegistro($idAuditoria, $emailAcudiente) {
        $acudiente = $this->db->get_where('acudiente', array("email" => $emailAcudiente))->result();
        $this->db->insert('auditoria_x_acudiente', array("id_auditoria" => $idAuditoria, "id_acudiente" => $acudiente[0]->id));
    }

}
