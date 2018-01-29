<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_reportes');
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

	public function index()
	{
		$data['html'] = $this->getTable();
		$this->load->view('v_admin', $data);
	}

	function buscar() {
		$buscador = _post('buscador');
		if($buscador == null || $buscador == '') {
			$buscador = null;
		}
		$html = '';
		$datos = $this->M_reportes->getDatosBuscador($buscador);
		$cont = 1;
		foreach ($datos as $key) {
		$html .= '<tr class="tr-cursor-pointer tr-ver-info-solicitud" data-idSolicitud="'.$cont.'">
                    <td class="text-center">'.$key->Nombres.' '.$key->Apellidos.'</td>
                    <td class="text-center">'.$key->Email.'</td>
                    <td class="text-center">'.$key->event_name.'</td>
                    <td class="text-center">'.$key->fecha.'</td>
                </tr>';
            $cont++;
		}
		return $html;
	}

	function getTable() {
		$datos = $this->M_reportes->getDatosInscritos();
		$html = '';
		$cont = 1;
		foreach ($datos as $key) {
			$html .= '<tr class="tr-cursor-pointer tr-ver-info-solicitud" data-idSolicitud="'.$cont.'">
                        <td class="text-center">'.$key->nombre_completo.'</td>
                        <td class="text-center">'.$key->Email.'</td>
                        <td class="text-center">'.$key->evento.'</td>
                        <td class="text-center">'.$key->fecha.'</td>
                    </tr>';
                $cont++;
		}
		return $html;
	}

	function cambiarFecha() {
		$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
			$fecha = _post('fecha');
			$evento = _post('evento');
			if($fecha == null || $fecha == '') {
				$fecha = null;
			}
			$html = '';
			$datos = $this->M_reportes->getDatosBuscadorFecha($fecha, $evento);
			foreach ($datos as $key) {
			$html .= '<tr>
                        <td>'.$key->Nombres.' '.$key->Apellidos.'</td>
                        <td>'.$key->Pais.'</td>
                        <td>'.$key->Email.'</td>
                        <td>'.$key->event_name.'</td>
                        <td>'.$key->fecha.'</td>
                    </tr>';
			}
			$data['html'] = $html;
			$data['error'] = EXIT_SUCCESS;
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}

	function cambiarEvento() {
		$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
			$evento = _post('evento');
			$fecha  = _post('fecha');
			if($evento == null || $evento == '') {
				$evento = null;
			}
			$html = '';
			$datos = $this->M_reportes->getDatosBuscadorEvento($evento, $fecha);
			foreach ($datos as $key) {
			$html .= '<tr>
                        <td>'.$key->Nombres.' '.$key->Apellidos.'</td>
                        <td>'.$key->Pais.'</td>
                        <td>'.$key->Email.'</td>
                        <td>'.$key->event_name.'</td>
                        <td>'.$key->fecha.'</td>
                    </tr>';
			}
			$data['html'] = $html;
			$data['error'] = EXIT_SUCCESS;
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}
}
