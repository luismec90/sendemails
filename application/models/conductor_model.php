<?php

class Conductor_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function obtenerConductores($criterios = "") {
        $query = "SELECT * 
                FROM conductor
                WHERE true";
        $query.=(isset($criterios["apellidos"])) ? " AND apellidos ILIKE '%{$criterios["apellidos"]}%'" : "";
        $query.=(isset($criterios["nombres"])) ? " AND nombres ILIKE '%{$criterios["nombres"]}%'" : "";
        $query.=(isset($criterios["cedula"])) ? " AND cedula ILIKE '%{$criterios["cedula"]}%'" : "";
        $query.=(isset($criterios["celular"])) ? " AND celular ILIKE '%{$criterios["celular"]}%'" : "";
        $query.=(isset($criterios["email"])) ? " AND email ILIKE '%{$criterios["email"]}%'" : "";
        $query.=" ORDER BY apellidos ASC";
        return $this->db->query($query)->result();
    }

    public function crear($data) {
        $this->db->insert('conductor', $data);
    }

    public function actualizar($data, $where) {
        $this->db->update('conductor', $data, $where);
    }

    public function eliminar($where) {
        $this->db->delete('conductor', $where);
    }

}
