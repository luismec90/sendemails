<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Estudiantes extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        session_start();
        $this->soyAdmin();
        $this->load->model('ruta_model');
        $this->load->model('estudiante_model');
        $this->load->model('ruta_x_estudiante_model');
    }

    public function index() {
        $this->escapar($_GET);
        $data["tab"] = "estudiantes";
        $data["rutas"] = $this->ruta_model->obtenerRutas();

        $filasPorPagina = 20;
        if (empty($_GET["page"])) {
            $inicio = 0;
            $paginaActual = 1;
        } else {
            $inicio = ($_GET["page"] - 1) * $filasPorPagina;
            $paginaActual = $_GET["page"];
        }

        $data["estudiantes"] = $this->estudiante_model->obtenerTodosLosEstudiantes($_GET, $filasPorPagina, $inicio);
        $data['paginaActiva'] = $paginaActual;
        $data["cantidadRegistros"] = $this->estudiante_model->cantidadRegistros();
        $data["cantidadRegistros"] = $data["cantidadRegistros"][0]->cantidad;
        $data["filasPorPagina"] = $filasPorPagina;
        $data['cantidadPaginas'] = ceil($data["cantidadRegistros"] / $filasPorPagina);
        foreach ($data["estudiantes"] as $row) {
            $row->rutas = str_replace('"', "'", json_encode($this->ruta_x_estudiante_model->obtenerRegistro(array("id_estudiante" => $row->id))));
        }

        $data["css"] = array("libs/jQuery-ui-1.10.4/css/smoothness/jquery-ui-1.10.4.custom.min");
        $data["js"] = array("libs/jQuery-ui-1.10.4/js/jquery-ui-1.10.4.custom.min", "libs/jQuery-Autocomplete/src/jquery.autocomplete", "js/admin/estudiantes");

        $this->load->view('include/header', $data);
        $this->load->view('admin/estudiantes_view');
        $this->load->view('include/footer');
    }

    public function crear() {
        $nombres = $this->input->post("nombres");
        $apellidos = $this->input->post("apellidos");
        $sexo = $this->input->post("sexo");
        $grado = $this->input->post("grado");
        $curso = $this->input->post("curso");
        $direccion = $this->input->post("direccion");
        $fechaNacimiento = $this->input->post("fechaNacimiento");
        $telefonoDomocilio = $this->input->post("telefonoDomocilio");
        $celular = $this->input->post("celular");
        $rutas = $this->input->post("rutas");
        if (!$nombres || !$apellidos || !$sexo || ($sexo != "femenino" && $sexo != "masculino") || !$grado || !$curso || !$direccion) {
            $this->mensaje("Datos inválidos", "error", "estudiantes");
        }
        if ($rutas) {
            foreach ($rutas as $row) {
                $this->validarCapacidadRuta($row);
            }
        }
        $data = array("nombres" => $nombres,
            "apellidos" => $apellidos,
            "sexo" => $sexo,
            "grado" => $grado,
            "curso" => $curso,
            "direccion" => $direccion,
            "fecha_nacimiento" => $fechaNacimiento,
            "telefono_casa" => $telefonoDomocilio,
            "celular" => $celular
        );
        $idEstudiante = $this->estudiante_model->crear($data);
        if ($rutas) {
            foreach ($rutas as $row) {
                $data = array("id_ruta" => $row,
                    "id_estudiante" => $idEstudiante);
                $this->ruta_x_estudiante_model->crear($data);
            }
        }
        $this->mensaje("Estudiante creado exitosamente", "success", "estudiantes");
    }

    public function editar() {
        $idEstudiante = $this->input->post("idEstudiante");
        $nombres = $this->input->post("nombres");
        $apellidos = $this->input->post("apellidos");
        $sexo = $this->input->post("sexo");
        $grado = $this->input->post("grado");
        $curso = $this->input->post("curso");
        $direccion = $this->input->post("direccion");
        $fechaNacimiento = $this->input->post("fechaNacimiento");
        $telefonoDomocilio = $this->input->post("telefonoDomocilio");
        $celular = $this->input->post("celular");
        $rutas = $this->input->post("rutas");
        if (!$nombres || !$apellidos || !$sexo || ($sexo != "femenino" && $sexo != "masculino") || !$grado || !$curso || !$direccion) {
            $this->mensaje("Datos inválidos", "error", "estudiantes");
        }
        if ($rutas) {
            foreach ($rutas as $row) {
                $rutaEstudiante = $this->ruta_x_estudiante_model->obtenerRegistro(array("id_estudiante" => $idEstudiante, "id_ruta" => $row));
                if (!$rutaEstudiante) {
                    $this->validarCapacidadRuta($row);
                }
            }
        }
        $data = array("nombres" => $nombres,
            "apellidos" => $apellidos,
            "sexo" => $sexo,
            "grado" => $grado,
            "curso" => $curso,
            "direccion" => $direccion,
            "fecha_nacimiento" => $fechaNacimiento,
            "telefono_casa" => $telefonoDomocilio,
            "celular" => $celular
        );
        $where = array("id" => $idEstudiante);
        $this->estudiante_model->actualizar($data, $where);

        $this->ruta_x_estudiante_model->eliminar(array("id_estudiante" => $idEstudiante));
        if ($rutas) {
            foreach ($rutas as $row) {
                $data = array("id_ruta" => $row,
                    "id_estudiante" => $idEstudiante);
                $this->ruta_x_estudiante_model->crear($data);
            }
        }
        $this->mensaje("Estudiante actualizado exitosamente", "success", "estudiantes");
    }

    public function eliminar() {
        $idEstudiante = $this->input->post("idEstudiante");
        if (!$idEstudiante) {
            $this->mensaje("Datos inválidos", "error", "estudiantes");
        }
        $where = array("id" => $idEstudiante);
        $this->estudiante_model->eliminar($where);
        $this->mensaje("Estudiante eliminado exitosamente", "success", "estudiantes");
    }

    public function obtenerAcudientes() {
        $idEstudiante = $this->input->get("idEstudiante");
        if (!$idEstudiante) {
            exit();
        }
        $this->load->model('acudiente_model');
        $acudientes = $this->acudiente_model->obtenerAcudientes($idEstudiante);
        if ($acudientes) {
            ?>
            <table class="table table-striped table-condensed table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Acudiente</th>
                        <th>Parentesco</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody id="tbody-asignar-acudientes">
                    <?php foreach ($acudientes as $row) { ?>
                        <tr class="fila-<?= $row->id ?>">
                            <td>
                                <input type='hidden' name='idAcudientes[]' value='<?= $row->id ?>' required>
                                <div><?= $row->nombres . " " . $row->apellidos ?></div>
                                <small class="text-muted"><?= $row->email ?></small>
                            </td>
                            <td>
                                <select name='parentescos[]' class='form-control' required>
                                    <option value=''>Seleccionar</option>
                                    <option value='hermana' <?= ("hermana" == $row->parentesco) ? "selected" : ""; ?>>hermana</option>
                                    <option value='hermano' <?= ("hermano" == $row->parentesco) ? "selected" : ""; ?>>hermano</option>
                                    <option value='hija' <?= ("hija" == $row->parentesco) ? "selected" : ""; ?>>hija</option>
                                    <option value='hijo' <?= ("hijo" == $row->parentesco) ? "selected" : ""; ?>>hijo</option>                                  
                                    <option value='nieta' <?= ("nieta" == $row->parentesco) ? "selected" : ""; ?>>nieta</option>
                                    <option value='nieto' <?= ("nieto" == $row->parentesco) ? "selected" : ""; ?>>nieto</option>
                                    <option value='sobrina' <?= ("sobrina" == $row->parentesco) ? "selected" : ""; ?>>sobrina</option>
                                    <option value='sobrino' <?= ("sobrino" == $row->parentesco) ? "selected" : ""; ?>>sobrino</option>
                                    <option value='familiar' <?= ("familiar" == $row->parentesco) ? "selected" : ""; ?>>familiar</option>
                                </select>
                            </td>
                            <td>
                                <a class="btn btn-danger boton-eliminar-parentesco" title="Eliminar"> <span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
        } else {
            ?>
            <div class="alert alert-warning text-center"><h5>Este estudiante no tiene acudienttes asignados</h5></div>
            <?php
        }
    }

    public function establecerAcudientes() {
        $idEstudiante = $this->input->post("idEstudiante");
        $idAcudientes = $this->input->post("idAcudientes");
        $parentescos = $this->input->post("parentescos");
        if (!$idEstudiante || sizeof($idAcudientes) != sizeof($parentescos)) {
            $this->mensaje("Datos inválidos", "error", "estudiantes");
        }
        $this->load->model('estudiante_x_acudiente_model');
        $this->estudiante_x_acudiente_model->eliminar(array("id_estudiante" => $idEstudiante));
        if ($idAcudientes && $parentescos) {
            foreach ($idAcudientes as $key => $val) {
                $data = array("id_estudiante" => $idEstudiante,
                    "id_acudiente" => $val,
                    "parentesco" => $parentescos[$key]);
                $this->estudiante_x_acudiente_model->crear($data);
            }
            $this->mensaje("Acudientes asignados exitosamente", "success", "estudiantes");
        } else {
            $this->mensaje("Acudientes eliminados exitosamente", "success", "estudiantes");
        }
    }

    public function cambiarDestino() {
        $idEstudiante = $this->input->post("idEstudiante");
        $fechaInicial = $this->input->post("fechaInicial");
        $fechaFinal = $this->input->post("fechaFinal");
        $direccion = $this->input->post("direccion");
        if (!$idEstudiante || !$fechaInicial || !$fechaFinal || !$direccion) {
            $this->mensaje("Datos inválidos", "error", "estudiantes");
        }
        $data = array("fecha_inicio_cambio_ruta" => $fechaInicial,
            "fecha_fin_cambio_ruta" => $fechaFinal,
            "direccion_cambio_ruta" => $direccion
        );
        $where = array("id" => $idEstudiante);
        $this->estudiante_model->actualizar($data, $where);
        $this->mensaje("Destino cambiado exitosamente", "success", "estudiantes");
    }

    private function validarCapacidadRuta($idRuta) {
        $ruta = $this->ruta_model->obtenerRuta(array("id" => $idRuta));
        $ocupacionActual = $this->ruta_model->ocupacionActual($idRuta);
        if ($ocupacionActual[0]->cantidad >= $ruta[0]->capacidad) {
            $this->mensaje("La ruta {$ruta[0]->nombre} no tiene más asientos disponibles", "error", "estudiantes");
        }
    }

}
