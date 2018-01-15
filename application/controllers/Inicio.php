<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_eventos');
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }

	public function index()
	{
		
		$data['nombres'] = _getSesion('Nombres');
		$html_datos = $this->htmlDatos();
		//_log(print_r($html_datos, true));
		$data['html'] = $html_datos;
		$this->load->view('v_index', $data);
	}

	function htmlDatos() {
		$datos = $this->M_eventos->getDatosEventos();
		_log(print_r($datos, true));
		$html = null;
		$count = 0;
		foreach ($datos as $key) {
			$html .= '<div class="col-xs-3" style="background: #fff; height: 200px" id="card'.$count.'">
		            	<div class="col-xs-12">
		            		<div class="col-xs-6">
		            			<span id="vacantes'.$count.'">25</span>
		            		</div>
		            		<div class="col-xs-12">
		            			<h4>'.$datos[$count]->event_name.'</h4>
		            		</div>
		            		<div class="col-xs-12">
		            			<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" id="btnInscr'.$count.'" onclick="inscribir('.$count.', 25);">Inscribir</button>
		            		</div>
		            	</div>
		            </div>';
		    $count++;
		}
		return $html;
	}
}
