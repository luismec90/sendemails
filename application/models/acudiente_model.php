<?php

class Acudiente_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function obtenerAcudientes($idEstudiante) {
        $query = "SELECT a.id,a.nombres,a.apellidos,a.sexo,a.email,ea.parentesco,e.id id_estudiante,e.nombres nombres_estudiante,e.apellidos apellidos_estudiante
                  FROM estudiante_x_acudiente ea
                  JOIN acudiente a ON a.id=ea.id_acudiente AND a.recibir_emails='1'
                  JOIN estudiante e ON e.id=ea.id_estudiante
                  WHERE ea.id_estudiante='$idEstudiante'";
        return $this->db->query($query)->result();
    }

    public function buscarAcudientes($query) {
        $query = "SELECT DISTINCT(a.id),a.id,a.nombres,a.apellidos,a.email
                  FROM acudiente a 
                  LEFT JOIN estudiante_x_acudiente ea ON ea.id_acudiente=a.id
                  LEFT JOIN estudiante e ON e.id=ea.id_estudiante
                  WHERE CONCAT(a.nombres,' ',a.apellidos) ILIKE '%$query%'
                  OR a.email ILIKE '%$query%'
                  OR CONCAT(e.nombres,' ',e.apellidos) ILIKE '%$query%'";
        //   echo $query;
        return $this->db->query($query)->result();
    }

    public function unsubscribe($email) {
        $this->db->update("acudiente", array("recibir_emails" => "0", "fecha_baja" => Date("Y-m-d H:i:s")), array("email" => $email));
    }

    public function obtenerAcudiente($data) {
        return $this->db->get_where("acudiente", $data)->result();
    }

    public function obtenerTodosLosAcudientes($criterios, $filasPorPagina, $inicio) {
        $query = "SELECT  * 
                FROM acudiente
                WHERE true";
        $query.=(isset($criterios["apellidos"])) ? " AND apellidos ILIKE '%{$criterios["apellidos"]}%'" : "";
        $query.=(isset($criterios["nombres"])) ? " AND nombres ILIKE '%{$criterios["nombres"]}%'" : "";
        $query.=(isset($criterios["telefono"])) ? " AND telefono1 ILIKE '%{$criterios["telefono"]}%'" : "";
        $query.=(isset($criterios["celular"])) ? " AND telefono3 ILIKE '%{$criterios["celular"]}%'" : "";
        $query.=(isset($criterios["email"])) ? " AND email ILIKE '%{$criterios["email"]}%'" : "";
        $query.=" ORDER BY apellidos ASC LIMIT $filasPorPagina OFFSET $inicio";
        return $this->db->query($query)->result();
    }

    public function cantidadRegistros($criterios) {
        $query = "SELECT count(*) cantidad 
                FROM acudiente
                WHERE true";
        $query.=(isset($criterios["apellidos"])) ? " AND apellidos ILIKE '%{$criterios["apellidos"]}%'" : "";
        $query.=(isset($criterios["nombres"])) ? " AND nombres ILIKE '%{$criterios["nombres"]}%'" : "";
        $query.=(isset($criterios["telefono"])) ? " AND telefono1 ILIKE '%{$criterios["telefono"]}%'" : "";
        $query.=(isset($criterios["celular"])) ? " AND telefono3 ILIKE '%{$criterios["celular"]}%'" : "";
        $query.=(isset($criterios["email"])) ? " AND email ILIKE '%{$criterios["email"]}%'" : "";
        return $this->db->query($query)->result();
    }

    public function crear($data) {
        $this->db->insert('acudiente', $data);
    }

    public function actualizar($data, $where) {
        $this->db->update('acudiente', $data, $where);
    }

    public function eliminar($where) {
        $this->db->delete('acudiente', $where);
    }

}
