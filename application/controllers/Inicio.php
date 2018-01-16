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
		$existe = $this->M_eventos->verificarInscritos(_getSesion('Id'), _getSesion('id_evento'));
		if($existe == null) {
			$html_datos = $this->htmlDatos('', '');
		}else {
			$html_datos = $this->htmlDatos('disabled', '#E0E0E0');
		}
		$html_datos1 = $this->htmlDatos1('', '');
	    $data['html1'] = $html_datos1;
		$data['html'] = $html_datos;
		$this->load->view('v_index', $data);
	}

	function htmlDatos($dato, $color) {
		$datos = $this->M_eventos->getDatosEventos();
		$html = null;
		$count = 0;
		foreach ($datos as $key) {
		       $html .= '<div class="mdl-card mdl-card-fecha cards0" id="card'.$count.'" style="background: '.$color.'">
		                    <div class="mdl-card__title">
		                       <span id="vacantes'.$count.'">'.$datos[$count]->vacantes.'</span> 
		                    </div>
		                    <div class="mdl-card__supporting-text nombre">
		                        <p>'.$datos[$count]->event_name.'</p>
		                    </div>
		                    <div class="mdl-card__actions">
		                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" id="btnInscr'.$count.'" onclick="inscribir('.$count.', 1, this);" '.$dato.'>Inscribir</button>
		                    </div>
		                </div>';
		    $count++;
		}
		return $html;
	}

	function htmlDatos1($dato, $color) {
		//$datos  = $this->M_eventos->getDatosEventos();
		//$datos = $this->M_eventos->getDatosEventos1();
		$datos = $this->M_eventos->getDatosEventos2();
		$html = null;
		$count1 = 0;
		foreach ($datos as $key) {
	            $html .= '<div class="mdl-card mdl-card-fecha cards1" id="card1'.$count1.'" style="background: '.$color.'">
	                    <div class="mdl-card__title">
	                       <span id="vacantes1'.$count1.'">'.$datos[$count1]->vacantes.'</span> 
	                    </div>
	                    <div class="mdl-card__supporting-text nombre">
	                        <p>'.$datos[$count1]->event_name.'</p>
	                    </div>
	                    <div class="mdl-card__actions">
	                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" id="btnInscr1'.$count1.'" onclick="inscribir(1'.$count1.', 2, this);" '.$dato.'>Inscribir</button>
	                    </div>
	                </div>';
		    $count1++;
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

        	$session = array('id_evento' => $id_evento,
								 'evento' => $evento);
          	$this->session->set_userdata($session);
        	$data['error'] = EXIT_SUCCESS;
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}


}
