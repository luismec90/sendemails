<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Autocomplete extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model('estudiante_model');
    }

    public function nombres() {
        $json = array();
        $query = trim($this->input->get('query'));
        if (!$query) {
            echo json_encode($json);
            exit();
        }
        $estudiantes = $this->estudiante_model->buscarEstudiantesPorNombres($query);
        $suggestions = array();

        foreach ($estudiantes as $key => $value) {
            $suggestions[$key] = array("value" => $value->nombres . " " . $value->apellidos, "data" => $value->id . " && " . $value->nombres . " && " . $value->apellidos);
        }

        $json["query"] = $query;
        $json["suggestions"] = $suggestions;
        echo json_encode($json);
    }

    public function apellidos() {
        $json = array();
        $query = trim($this->input->get('query'));
        if (!$query) {
            echo json_encode($json);
            exit();
        }
        $estudiantes = $this->estudiante_model->buscarEstudiantesPorApellidos($query);
        $suggestions = array();

        foreach ($estudiantes as $key => $value) {
            $suggestions[$key] = array("value" => $value->nombres . " " . $value->apellidos, "data" => $value->id . " && " . $value->nombres . " && " . $value->apellidos);
        }

        $json["query"] = $query;
        $json["suggestions"] = $suggestions;
        echo json_encode($json);
    }

    public function acudiente() {
        $json = array();
        $query = trim($this->input->get('query'));
        if (!$query) {
            echo json_encode($json);
            exit();
        }
        $estudiantes = $this->estudiante_model->buscarEstudiantesPorAcudiente($query);
        $suggestions = array();
        $idEstudiantes = "";
        foreach ($estudiantes as $key => $value) {
            $suggestions[$key] = array("value" => $value->nombres . " " . $value->apellidos, "data" => $value->id . " && " . $value->nombres . " && " . $value->apellidos);
            $idEstudiantes.="-" . $key;
        }
        if (sizeof($estudiantes) > 1) {
            $suggestions[-1] = array("value" => "Seleccionar todos", "data" => json_encode($suggestions));
        }
        $json["query"] = $query;
        $json["suggestions"] = $suggestions;
        echo json_encode($json);
    }

    public function destinatarios() {
        $this->load->model('acudiente_model');
        $json = array();
        $query = trim($this->input->get('query'));
        if (!$query) {
            echo json_encode($json);
            exit();
        }
        $estudiantes = $this->acudiente_model->buscarAcudientes($query);
        $suggestions = array();
        foreach ($estudiantes as $key => $value) {
            $suggestions[$key] = array("value" => $value->nombres . " " . $value->apellidos . " (" . $value->email . ")", "data" => $value->email);
        }


        $json["query"] = $query;
        $json["suggestions"] = $suggestions;
        echo json_encode($json);
    }

      public function obtenerAcudientes() {
        $this->load->model('acudiente_model');
        $json = array();
        $query = trim($this->input->get('query'));
        if (!$query) {
            echo json_encode($json);
            exit();
        }
        $estudiantes = $this->acudiente_model->buscarAcudientes($query);
        $suggestions = array();
        foreach ($estudiantes as $key => $value) {
            $suggestions[$key] = array("value" => $value->nombres . " " . $value->apellidos . "<br> (" . $value->email . ")", "data" => $value->id. " && " . $value->nombres . " " . $value->apellidos."&&".$value->email);
        }


        $json["query"] = $query;
        $json["suggestions"] = $suggestions;
        echo json_encode($json);
    }
}
