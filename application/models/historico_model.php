<?php

class Historico_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function obtenerRegistros($criterios, $filasPorPagina, $inicio) {
        $query = "SELECT SQL_CALC_FOUND_ROWS * 
                FROM historico
                WHERE TRUE";
        $query.=(isset($criterios["estudiante"])) ? " AND estudiante LIKE '%{$criterios["estudiante"]}%'" : "";
        $query.=(isset($criterios["ruta"])) ? " AND ruta LIKE '%{$criterios["ruta"]}%'" : "";
        $query.=(isset($criterios["bus"])) ? " AND bus LIKE '%{$criterios["bus"]}%'" : "";
        $query.=(isset($criterios["destino"])) ? " AND destino = '{$criterios["destino"]}'" : "";
        $query.=(isset($criterios["abordo"])) ? " AND abordo = '{$criterios["abordo"]}'" : "";
        $query.=(isset($criterios["fecha"])) ? " AND DATE(fecha_abordo)='{$criterios["fecha"]}'" : "";
        $query.=(isset($criterios["guia"])) ? " AND guia LIKE '%{$criterios["guia"]}%'" : "";
        $query.=" ORDER BY fecha_abordo DESC LIMIT $inicio,$filasPorPagina";
        return $this->db->query($query)->result();
    }

    public function cantidadRegistros() {
        $query = "SELECT found_rows() AS cantidad";
        return $this->db->query($query)->result();
    }

    public function crear($data) {
        $this->db->insert('historico', $data);
    }

    public function actualizar($data, $where) {
        $this->db->update('historico', $data, $where);
    }

}
