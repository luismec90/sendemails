<?php

class Estudiante_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function obtenerEstudiantes($idRuta, $destino) {
        $query = "SELECT DISTINCT e.id,e.nombres,e.apellidos,be.destino,be.abordo  
                  FROM estudiante e
                  LEFT JOIN ruta_x_estudiante re ON re.id_estudiante=e.id
                  LEFT JOIN bitacora_estudiante be ON be.id_estudiante=e.id AND DATE(be.fecha_creacion) = DATE(now()) AND  be.id_ruta='$idRuta' AND be.destino='$destino'
                  WHERE re.id_ruta='$idRuta' or be.id_ruta='$idRuta'
                  ORDER BY e.apellidos,e.nombres";
        return $this->db->query($query)->result();
    }

    public function obtenerEstudiantesCheckout($idRuta, $destino) {
        $query = "SELECT DISTINCT e.id,e.nombres,e.apellidos,be.destino,be.abordo,be.arrivo 
                  FROM estudiante e
                  LEFT JOIN ruta_x_estudiante re ON re.id_estudiante=e.id
                  JOIN bitacora_estudiante be ON be.id_estudiante=e.id AND DATE(be.fecha_creacion) = DATE(now()) AND  be.id_ruta='$idRuta' AND be.destino='$destino' AND be.abordo='si' 
                  WHERE re.id_ruta='$idRuta' or be.id_ruta='$idRuta'
                  ORDER BY e.apellidos,e.nombres";
        // echo $query;
        return $this->db->query($query)->result();
    }

    public function buscarEstudiantesPorNombres($query) {
        $query = "SELECT id,nombres,apellidos 
                  FROM estudiante
                  WHERE nombres ILIKE '%$query%'";
        return $this->db->query($query)->result();
    }

    public function buscarEstudiantesPorApellidos($query) {
        $query = "SELECT id,nombres,apellidos 
                  FROM estudiante
                  WHERE apellidos ILIKE '%$query%'";
        return $this->db->query($query)->result();
    }

    public function buscarEstudiantesPorAcudiente($query) {
        $query = "SELECT a.nombres nombres_acudiente,a.apellidos apellidos_acudiente,e.id,e.nombres,e.apellidos 
                  FROM acudiente a
                  JOIN estudiante_x_acudiente ea ON ea.id_acudiente=a.id
                  JOIN estudiante e ON e.id=ea.id_estudiante
                  WHERE a.nombres ILIKE '%$query%'
                  OR a.apellidos ILIKE '%$query%'";
        //   echo $query;
        return $this->db->query($query)->result();
    }

    public function obtenerTodosLosEstudiantes($criterios, $filasPorPagina, $inicio) {
        $query = "SELECT DISTINCT  e.*
					 FROM estudiante e
					 LEFT JOIN ruta_x_estudiante re ON re.id_estudiante=e.id
					 WHERE TRUE ";
        $query.=(isset($criterios["apellidos"])) ? " AND e.apellidos ILIKE '%{$criterios["apellidos"]}%'" : "";
        $query.=(isset($criterios["nombres"])) ? " AND e.nombres ILIKE '%{$criterios["nombres"]}%'" : "";
        $query.=(isset($criterios["grado"])) ? " AND e.grado ILIKE '%{$criterios["grado"]}%'" : "";
        $query.=(isset($criterios["curso"])) ? " AND e.curso ILIKE '%{$criterios["curso"]}%'" : "";
        $query.=(isset($criterios["ruta"])) ? " AND re.id_ruta='{$criterios["ruta"]}'" : "";
        $query.=" ORDER BY e.apellidos ASC LIMIT $filasPorPagina OFFSET $inicio";
        return $this->db->query($query)->result();
    }

    public function cantidadRegistros($criterios) {
        $query = "SELECT count(DISTINCT  e.*) cantidad
					 FROM estudiante e
					 LEFT JOIN ruta_x_estudiante re ON re.id_estudiante=e.id
					 WHERE TRUE ";
        $query.=(isset($criterios["apellidos"])) ? " AND e.apellidos ILIKE '%{$criterios["apellidos"]}%'" : "";
        $query.=(isset($criterios["nombres"])) ? " AND e.nombres ILIKE '%{$criterios["nombres"]}%'" : "";
        $query.=(isset($criterios["grado"])) ? " AND e.grado ILIKE '%{$criterios["grado"]}%'" : "";
        $query.=(isset($criterios["curso"])) ? " AND e.curso ILIKE '%{$criterios["curso"]}%'" : "";
        $query.=(isset($criterios["ruta"])) ? " AND re.id_ruta='{$criterios["ruta"]}'" : "";
        return $this->db->query($query)->result();
    }

    public function obtenerRegistro($where) {
        return $this->db->get_where('estudiante', $where)->result();
    }

    public function crear($data) {
        $this->db->insert('estudiante', $data);
        return $this->db->insert_id();
    }

    public function actualizar($data, $where) {
        $this->db->update('estudiante', $data, $where);
    }

    public function eliminar($where) {
        $this->db->delete('estudiante', $where);
    }

}
