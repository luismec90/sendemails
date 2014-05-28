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

    public function obtenerGuias($criterios = "") {
        $query = "SELECT * 
                FROM usuario
                WHERE rol='usuario' ";
        $query.=(isset($criterios["apellidos"])) ? " AND apellidos LIKE '%{$criterios["apellidos"]}%'" : "";
        $query.=(isset($criterios["nombres"])) ? " AND nombres LIKE '%{$criterios["nombres"]}%'" : "";
        $query.=(isset($criterios["usuario"])) ? " AND usuario LIKE '%{$criterios["usuario"]}%'" : "";
        $query.=(isset($criterios["celular"])) ? " AND celular LIKE '%{$criterios["celular"]}%'" : "";
        $query.=(isset($criterios["email"])) ? " AND email LIKE '%{$criterios["email"]}%'" : "";
        $query.=" ORDER BY apellidos ASC";
        return $this->db->query($query)->result();
    }

    public function crear($data) {
        $this->db->insert('usuario', $data);
    }

    public function actualizar($data, $where) {
        $this->db->update('usuario', $data, $where);
    }

    public function eliminar($where) {
        $this->db->delete('usuario', $where);
    }

}
