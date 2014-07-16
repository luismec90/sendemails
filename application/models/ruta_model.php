<?php

class Ruta_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function obtenerRuta($where) {
        return $this->db->get_where('ruta', $where)->result();
    }

    public function obtenerRutas($criterios = "") {
        $query = "SELECT r.*,c.id id_conductor,c.nombres,c.apellidos 
                  FROM ruta r
                  JOIN conductor c ON c.id=r.id_conductor
                  WHERE true";
        $query.=(isset($criterios["conductor"])) ? " AND CONCAT(c.nombres,' ',c.apellidos) ILIKE '%{$criterios["conductor"]}%'" : "";
        $query.=(isset($criterios["ruta"])) ? " AND r.nombre ILIKE '%{$criterios["ruta"]}%'" : "";
        $query.=(isset($criterios["bus"])) ? " AND r.bus ILIKE '%{$criterios["bus"]}%'" : "";
        $query.= " ORDER BY r.nombre ASC";
        return $this->db->query($query)->result();
    }

    public function obtenerRutasOrdenadas($criterios = "") {
        $query = "select  *,regexp_replace(nombre, '[a-zA-Z]', '', 'g')::integer orden1,regexp_replace(nombre, '[^a-zA-Z]', '', 'g') orden2 from ruta order by orden1,orden2";
        return $this->db->query($query)->result();
    }

    public function obtenerRegistros($where) {
        return $this->db->get_where('ruta', $where)->result();
    }

    public function crear($data) {
        $this->db->insert('ruta', $data);
    }

    public function actualizar($data, $where) {
        $this->db->update('ruta', $data, $where);
    }

    public function eliminar($where) {
        $this->db->delete('ruta', $where);
    }

    public function ocupacionActual($idRuta) {
        $query = "SELECT COUNT(*) cantidad FROM ruta_x_estudiante WHERE id_ruta='$idRuta'";
        return $this->db->query($query)->result();
    }

    public function obtenerBuses() {
        $query = "SELECT DISTINCT(bus) nombre_bus FROM ruta ORDER BY nombre_bus";
        return $this->db->query($query)->result();
    }

}
