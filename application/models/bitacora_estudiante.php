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
        if ($destino == "casa") {
            $query = "SELECT (a.email)  
                  FROM bitacora_estudiante be
                  JOIN estudiante_x_acudiente ea ON ea.id_estudiante=be.id_estudiante
                  JOIN acudiente a ON ea.id_acudiente=a.id
                  WHERE be.id_ruta='$idRuta'                
                  AND be.destino='$destino'
                  AND DATE(be.fecha_creacion) = DATE(now())
                  AND be.abordo='si'
                  AND be.arrivo is NULL
                  AND a.recibir_emails='1'";
        } else if ($destino == "colegio") {
            $query = "SELECT (a.email)  from ruta_x_estudiante re 
                        JOIN estudiante_x_acudiente ea ON re.id_estudiante=ea.id_estudiante
                        JOIN acudiente a ON ea.id_acudiente=a.id 
                        WHERE re.id_ruta='$idRuta' and a.recibir_emails='1' AND a.id not in(
                                           SELECT a.id  
                                          FROM bitacora_estudiante be
                                          JOIN estudiante_x_acudiente ea ON ea.id_estudiante=be.id_estudiante
                                          JOIN acudiente a ON ea.id_acudiente=a.id
                                          WHERE be.id_ruta='$idRuta'                
                                          AND be.destino='$destino'
                                          AND DATE(be.fecha_creacion) = DATE(now())
                                          AND a.recibir_emails='1')";
        }
        return $this->db->query($query)->result();
    }

    public function actualizarRegistro($data, $where) {
        $this->db->update("bitacora_estudiante", $data, $where);
    }

}
