<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Emails extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        session_start();
        $this->estoyLogueado();
        $this->load->model('bitacora_estudiante');
        $this->load->model('acudiente_model');
        $this->load->model('ruta_model');
        $this->load->model('usuario_model');
        $this->load->model('historico_model');
    }

    public function enviarEmails() {
        $estudiantes = $this->input->post('estudiante');
        $idRuta = $this->input->post('ruta');
        $where = array("id" => $idRuta);
        $ruta = $this->ruta_model->obtenerRuta($where);
        $destino = $this->input->post('destino');
        $origen = ($destino == "casa") ? "colegio" : "casa";
        $textoDestino = ($destino == "casa") ? "el colegio" : "su casa";

        if (!$estudiantes) {
            $this->mensaje("No se ha enviado ningún e-mail", "success", "ruta/$idRuta/$origen");
        }
        $guia = $this->usuario_model->obtenerUsuario(array('id' => $_SESSION["idUsuario"]));
        foreach ($estudiantes as $key => $value) {
            $abordo = ($value == "abordo") ? "si" : "no";
            if ($origen == "colegio" && $abordo == "no") {
                $textoDestino.=". Este caso es de conocimiento del colegio";
            }
            $textoAbordo = ($value == "abordo") ? "" : "NO";
            $data = array(
                "id_estudiante" => $key,
                "id_ruta" => $idRuta,
                "destino" => $destino,
                "abordo" => $abordo
            );

            $this->bitacora_estudiante->crearRegistro($data);
            $acudientes = $this->acudiente_model->obtenerAcudientes($key);
            $nombreRuta = $ruta[0]->nombre;
            if ($acudientes) {
                $data = array("estudiante" => $acudientes[0]->nombres_estudiante . " " . $acudientes[0]->apellidos_estudiante,
                    "ruta" => $nombreRuta,
                    "bus" => $ruta[0]->bus,
                    "destino" => $destino,
                    "abordo" => $abordo,
                    "fecha_abordo" => date("Y-m-d H:i:s"),
                    "guia" => $guia[0]->nombres . " " . $guia[0]->apellidos);
                $this->historico_model->crear($data);
            }

            $fecha = $this->obtenerFecha();
            foreach ($acudientes as $row) {
                $headers = "From: National Tours <no-reply@nationaltours.com.co>\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $subject = "Informe de Ruta";

                if ($row->sexo == "femenino") {
                    $saludo = "Estimada Señora:";
                } else {
                    $saludo = "Estimado Señor:";
                }
                $nombreAcudiente = $row->nombres . " " . $row->apellidos;
                $nombreEstudiante = $row->nombres_estudiante . " " . $row->apellidos_estudiante;
                $email = $row->email;
                $parentesco = $row->parentesco;
                ob_start();
                if ($row->id_ruta == $idRuta) {
                    include("application/views/template/email.php");
                } else {
                    include("application/views/template/email_cambio_ruta.php");
                }
                $contenido = ob_get_contents();
                ob_end_clean();
                mail($email, $subject, $contenido, $headers);
            }
        }
        $this->mensaje("Se han enviado " . sizeof($estudiantes) . " e-mails", "success", "ruta/$idRuta/$origen");
    }

    public function enviarEmailsRedactados() {
        $this->load->model('auditoria_model');
        $this->load->model('auditoria_x_acudiente_model');
        $this->load->model('copia_email_model');

        $incluirRuta = $this->input->post('incluirRuta');
        $idRuta = $this->input->post('ruta');
        $destino = $this->input->post('destino');
        $origen = ($destino == "casa") ? "colegio" : "casa";
        $emails = "";
        $destinatarios = $this->input->post('destinatarios');
        $guia = $this->usuario_model->obtenerUsuario(array('id' => $_SESSION["idUsuario"]));
        if (strlen($destinatarios) > 4) {
            $destinatarios = trim($destinatarios);
            $destinatarios = ltrim($destinatarios, ",");
            $destinatarios = rtrim($destinatarios, ",");
            $destinatarios = explode(",", $destinatarios);
            foreach ($destinatarios as $row) {
                $acudiente = $this->acudiente_model->obtenerAcudiente(array("email" => $row));
                if (sizeof($acudiente) == 0 || $acudiente[0]->recibir_emails == 1) {
                    $emails.=",$row";
                }
            }
        }
        $copia_emails = $this->copia_email_model->obtenerregistros();
        foreach ($copia_emails as $row) {
            $emails.=",{$row->email}";
        }
        $destinatarios = $emails = ltrim($emails, ",");

        $subject = $this->input->post('asunto');
        $mensaje = $this->input->post('mensaje');
        $data = array(
            "id_usuario" => $_SESSION["idUsuario"],
            "asunto" => $subject,
            "destinatarios" => $destinatarios,
            "mensaje" => $mensaje);
        $lastId = $this->auditoria_model->crearRegistro($data);
        if ($incluirRuta == "true") {
            $acudientes = $this->bitacora_estudiante->obtenerAcudientes($idRuta, $destino);
            foreach ($acudientes as $row) {
                $emails.="," . $row->email;
                $this->auditoria_x_acudiente_model->crearRegistro($lastId, $row->email);
            }
        }
        $subject = utf8_decode($subject);


        $emails = array_unique(explode(",", $emails));
        $cantidadCorreos = sizeof($emails) - sizeof($copia_emails);
        if (isset($emails[0]) && $emails[0] == "") {
            $cantidadCorreos--;
        }
        $emails = join(",", $emails);
        $emails = ltrim($emails, ",");
        $emails = rtrim($emails, ",");
        $headers = "From: National Tours <no-reply@nationaltours.com.co>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= "BCC: $emails\r\n";
        ob_start();
        include("application/views/template/custom_email.php");
        $contenido = ob_get_contents();
        ob_end_clean();
        mail("no-reply@nationaltours.com.co", $subject, $contenido, $headers);
        if ($cantidadCorreos == 0) {
            $this->mensaje("No se ha enviado ningún e-mail", "success", "redactaremail/$idRuta/$origen");
        } else {
            $this->mensaje("Se han enviado " . $cantidadCorreos . " e-mails", "success", "redactaremail/$idRuta/$origen");
        }
    }

    private function obtenerFecha() {
        $meses = ["none", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $date = date('Y-m-d H:i:s');
        $año = date('Y', strtotime($date));
        $mes = date('n', strtotime($date));
        $dia = date('d', strtotime($date));
        $hora = date('h:i a', strtotime($date));
        return "{$meses[$mes]} $dia de $año a la(s) $hora";
    }

    public function enviarEmailsCheckOut() {
        $estudiantes = $this->input->post('estudiante');
        $idRuta = $this->input->post('ruta');
        $where = array("id" => $idRuta);
        $ruta = $this->ruta_model->obtenerRuta($where);
        $destino = $this->input->post('destino');
        $origen = ($destino == "casa") ? "colegio" : "casa";
        $textoDestino = ($destino == "casa") ? "el destino acordado para esta ruta" : "el colegio";
        if (!$estudiantes) {
            $this->mensaje("No se ha enviado ningún e-mail", "success", "ruta/checkout/$idRuta/$origen");
        }
        $guia = $this->usuario_model->obtenerUsuario(array('id' => $_SESSION["idUsuario"]));
        $nombreRuta = $ruta[0]->nombre;
        $fecha = $this->obtenerFecha();
        $fechaActual = date("Y-m-d");
        foreach ($estudiantes as $key => $value) {
            if ($destino == "casa") {
                $this->load->model('estudiante_model');
                $textoDestino = "su casa";
                $estudiante = $this->estudiante_model->obtenerRegistro(array("id" => $key));
                if ($fechaActual >= $estudiante[0]->fecha_inicio_cambio_ruta && $fechaActual <= $estudiante[0]->fecha_fin_cambio_ruta) {
                    $textoDestino = $estudiante[0]->direccion_cambio_ruta;
                }
            } else {
                $textoDestino = "el colegio";
            }
        }
        foreach ($estudiantes as $key => $value) {

            $data = array(
                "arrivo" => "si"
            );
            $where = array(
                "id_estudiante" => $key,
                "id_ruta" => $idRuta,
                "destino" => $destino,
                "DATE(fecha_creacion)" => date("Y-m-d")
            );
            $this->bitacora_estudiante->actualizarRegistro($data, $where);
            $acudientes = $this->acudiente_model->obtenerAcudientes($key);
            if ($acudientes) {
                $data = array(
                    "fecha_arrivo" => date("Y-m-d H:i:s")
                );
                $where = array("estudiante" => $acudientes[0]->nombres_estudiante . " " . $acudientes[0]->apellidos_estudiante,
                    "ruta" => $nombreRuta,
                    "bus" => $ruta[0]->bus,
                    "destino" => $destino,
                    "DATE(fecha_abordo)" => date("Y-m-d")
                );
                $this->historico_model->actualizar($data, $where);
            }
            foreach ($acudientes as $row) {
                $headers = "From: National Tours <no-reply@nationaltours.com.co>\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $subject = "Informe de Ruta";

                if ($row->sexo == "femenino") {
                    $saludo = "Estimada Señora:";
                } else {
                    $saludo = "Estimado Señor:";
                }
                $nombreAcudiente = $row->nombres . " " . $row->apellidos;
                $nombreEstudiante = $row->nombres_estudiante . " " . $row->apellidos_estudiante;
                $email = $row->email;
                $parentesco = $row->parentesco;
                ob_start();
                include("application/views/template/arrivo.php");
                $contenido = ob_get_contents();
                ob_end_clean();
                mail($email, $subject, $contenido, $headers);
            }
        }
        $this->mensaje("Se han enviado " . sizeof($estudiantes) . " e-mails", "success", "ruta/checkout/$idRuta/$origen");
    }

}
