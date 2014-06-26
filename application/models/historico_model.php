<?php

class Historico_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function obtenerRegistros($criterios, $filasPorPagina, $inicio) {
        $query = "SELECT * 
                FROM historico
                WHERE TRUE";
        $query.=(isset($criterios["estudiante"])) ? " AND estudiante ILIKE '%{$criterios["estudiante"]}%'" : "";
        $query.=(isset($criterios["ruta"])) ? " AND ruta ILIKE '%{$criterios["ruta"]}%'" : "";
        $query.=(isset($criterios["bus"])) ? " AND bus ILIKE '%{$criterios["bus"]}%'" : "";
        $query.=(isset($criterios["destino"])) ? " AND destino = '{$criterios["destino"]}'" : "";
        $query.=(isset($criterios["abordo"])) ? " AND abordo = '{$criterios["abordo"]}'" : "";
        $query.=(isset($criterios["fecha"])) ? " AND DATE(fecha_abordo)='{$criterios["fecha"]}'" : "";
        $query.=(isset($criterios["guia"])) ? " AND guia ILIKE '%{$criterios["guia"]}%'" : "";
        $query.=" ORDER BY fecha_abordo DESC LIMIT $filasPorPagina OFFSET $inicio";
        return $this->db->query($query)->result();
    }

    public function cantidadRegistros($criterios) {
        $query = "SELECT COUNT(*) cantidad
                FROM historico
                WHERE TRUE";
        $query.=(isset($criterios["estudiante"])) ? " AND estudiante ILIKE '%{$criterios["estudiante"]}%'" : "";
        $query.=(isset($criterios["ruta"])) ? " AND ruta ILIKE '%{$criterios["ruta"]}%'" : "";
        $query.=(isset($criterios["bus"])) ? " AND bus ILIKE '%{$criterios["bus"]}%'" : "";
        $query.=(isset($criterios["destino"])) ? " AND destino = '{$criterios["destino"]}'" : "";
        $query.=(isset($criterios["abordo"])) ? " AND abordo = '{$criterios["abordo"]}'" : "";
        $query.=(isset($criterios["fecha"])) ? " AND DATE(fecha_abordo)='{$criterios["fecha"]}'" : "";
        $query.=(isset($criterios["guia"])) ? " AND guia ILIKE '%{$criterios["guia"]}%'" : "";
        return $this->db->query($query)->result();
    }

    public function crear($data) {
        $this->db->insert('historico', $data);
    }

    public function actualizar($data, $where) {
        $this->db->update('historico', $data, $where);
    }

}
