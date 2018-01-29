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
}
