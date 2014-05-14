<?php

class Bitacora_estudiante extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function obtenerRegistros($where) {
        return $this->db->get_where('bitacora_estudiante', $where)->result();
    }

    public function crearRegistro($data) {
        $this->db->insert('bitacora_estudiante', $data);
    }

    public function obtenerAcudientes($idRuta, $destino) {
        $query = "SELECT DISTINCT(a.email)  
                  FROM bitacora_estudiante be
                  JOIN estudiante_x_acudiente ea ON ea.id_estudiante=be.id_estudiante
                  JOIN acudiente a ON ea.id_acudiente=a.id
                  WHERE be.id_ruta='$idRuta'                
                  AND be.destino='$destino'
                  AND DATE(be.fecha_creacion) = DATE(now())
                  AND be.abordo='si'
                  AND be.arrivo is NULL
                  AND a.recibir_emails=1";
        //echo $query;
        return $this->db->query($query)->result();
    }

    public function actualizarRegistro($data, $where) {
        $this->db->update("bitacora_estudiante", $data, $where);
    }

}
