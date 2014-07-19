<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Historico extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        session_start();
        $this->soyAdmin();
        $this->load->model('historico_model');
    }

    public function index() {
        $this->escapar($_GET);
        $data["tab"] = "historico";

        $filasPorPagina = 20;
        if (empty($_GET["page"])) {
            $inicio = 0;
            $paginaActual = 1;
        } else {
            $inicio = ($_GET["page"] - 1) * $filasPorPagina;
            $paginaActual = $_GET["page"];
        }
        
        if (empty($_GET["desde"])) {
            $_GET["desde"] = date("Y-m-d");
        }

        $data["historico"] = $this->historico_model->obtenerRegistros($_GET, $filasPorPagina, $inicio);
        $data['paginaActiva'] = $paginaActual;
        $data["cantidadRegistros"] = $this->historico_model->cantidadRegistros($_GET);
        $data["cantidadRegistros"] = $data["cantidadRegistros"][0]->cantidad;
        $data["filasPorPagina"] = $filasPorPagina;
        $data['cantidadPaginas'] = ceil($data["cantidadRegistros"] / $filasPorPagina);

        $data["css"] = array("libs/jQuery-ui-1.10.4/css/smoothness/jquery-ui-1.10.4.custom.min");
        $data["js"] = array("libs/jQuery-ui-1.10.4/js/jquery-ui-1.10.4.custom.min", "js/admin/historico");

        $this->load->view('include/header', $data);
        $this->load->view('admin/historico_view');
        $this->load->view('include/footer');
    }

    public function toExcel() {

        $informe = $this->historico_model->obtenerRegistros($_GET);
        require_once('assets/libs/PHPExcel/PHPExcel.php');
        $objPHPExcel = new PHPExcel();




// Add some data
        $styleArray = array(
            'font' => array(
                'bold' => true
            )
        );
        $objPHPExcel->getActiveSheet()->getStyle('1')->applyFromArray($styleArray);

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'Estudiante')
                ->setCellValue('B1', 'Ruta')
                ->setCellValue('C1', 'Bus')
                ->setCellValue('D1', 'Destino')
                ->setCellValue('E1', 'Abordo')
                ->setCellValue('F1', 'Fecha de check-in')
                ->setCellValue('G1', 'Fecha de check-out')
                ->setCellValue('H1', 'Guia');






        $row = 2;
        foreach ($informe as $record) {
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $row, $record->estudiante);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $row, $record->ruta);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $row, $record->bus);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $row, $record->destino);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $row, $record->abordo);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5, $row, $record->fecha_abordo);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6, $row, $record->fecha_arrivo);
            $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7, $row, $record->guia);
            $row++;
        }



// Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="informe.xlsx"');
        header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

}
