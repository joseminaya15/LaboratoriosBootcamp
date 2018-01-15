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
		$datos = $this->M_eventos->getDatosEventos();
		$data['nombres'] = _getSesion('Nombres');
		$data['fecha'] = $datos[0]->fecha;
		/*$existe = $this->M_eventos->verificarInscritos(_getSesion('Id'));
		if($existe == null) {
			$html_datos = $this->htmlDatos('');
		}else {
			_log('entra');
			$html_datos = $this->htmlDatos('disabled');
		}	
		$data['html'] = $html_datos;*/
		$this->load->view('v_index', $data);
	}

	function htmlDatos($dato) {
		$datos = $this->M_eventos->getDatosEventos();
		$html = null;
		$count = 0;
		foreach ($datos as $key) {
			$html .= '<div class="col-xs-3" style="background: #fff; height: 200px" id="card'.$count.'">
		            	<div class="col-xs-12">
		            		<div class="col-xs-6">
		            			<span id="vacantes'.$count.'">'.$datos[$count]->vacantes.'</span>
		            		</div>
		            		<div class="col-xs-12 nombre">
		            			<h4>'.$datos[$count]->event_name.'</h4>
		            		</div>
		            		<div class="col-xs-12 boton">
		            			<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" id="btnInscr'.$count.'" onclick="inscribir('.$count.', 25, this);" '.$dato.'>Inscribir</button>
		            		</div>
		            	</div>
		            </div>';
		    $count++;
		}
		return $html;
	}

	function inscribir() {
		$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
        	$vacantes = _post('vacantes');
        	$evento   = _post('evento');
        	$id_evento = $this->M_eventos->getDatosIdEventos($evento);
        	$updt = array('vacantes' => $vacantes);
        	$updt_datos = $this->M_eventos->updateDatos($updt, $id_evento, 'eventos');
        	$arrayInsert = array('id_evento' => $id_evento,
        						 'id_pers'   => _getSesion('Id') );
        	$this->M_eventos->insertarDatos($arrayInsert, 'inscritos');
        	$data['error'] = EXIT_SUCCESS;
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}


}
