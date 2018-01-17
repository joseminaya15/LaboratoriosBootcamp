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
		if(_getSesion('correo') == null) {
			$newURL = 'Login';
			header('Location: '.$newURL);
		}
		$datos = $this->M_eventos->getDatosEventos();
		$html_datos 	 = $this->htmlDatos();
		$data['nombres'] = _getSesion('Nombres');
		$data['fecha']   = $datos[0]->fecha;
		$html_datos1     = $this->htmlDatos1();
	    $data['html1']   = $html_datos1;
		$data['html']    = $html_datos;
		$data['html2']   = $this->htmlDatos2();
		$this->load->view('v_index', $data);
	}

	function htmlDatos() {
		$color = '';
		$dato = '';
		$datos = $this->M_eventos->getDatosEventos();
		foreach ($datos as $key) {
			$existe = '';
			$existe = $this->M_eventos->verificarInscritos(_getSesion('Id'), $key->Id);
			if(count($existe) != 0) {
				$dato = 'disabled';
				$color = '#E0E0E0';
			}
		}
		$html = null;
		$count = 0;
		foreach ($datos as $key) {
		       $html .= '<div class="mdl-card mdl-card-fecha cards1" id="card'.$count.'" style="background: '.$color.'">
		       				<div class="fecha"><i class="mdi mdi-date_range"></i>28 Enero</div>
		                    <div class="mdl-card__supporting-text">
		                    	<div class="nombre-evento">
		                        	<p>'.$datos[$count]->event_name.'</p>
		                    	</div>
		                        <span id="vacantes'.$count.'"><i class="mdi mdi-keyboard_arrow_right"></i><i class="mdi mdi-keyboard_arrow_right second"></i><label>'.$datos[$count]->vacantes.'</label> cupos</span> 
		                    </div>
		                    <div class="mdl-card__actions text-right boton">
		                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" id="btnInscr'.$count.'" onclick="inscribir('.$count.', 1, this);" '.$dato.'>Inscribir</button>
		                    </div>
		                </div>';
		    $count++;
		}
		return $html;
	}

	function htmlDatos1() {
		$color = '';
		$dato = '';
		$datos = $this->M_eventos->getDatosEventos2();
		foreach ($datos as $key) {
			$existe = '';
			$existe = $this->M_eventos->verificarInscritos(_getSesion('Id'), $key->Id);
			if(count($existe) != 0) {
				$dato = 'disabled';
				$color = '#E0E0E0';
			}
		}
		$html = null;
		$count1 = 0;
		foreach ($datos as $key) {
	            $html .= '<div class="mdl-card mdl-card-fecha cards2" id="card1'.$count1.'" style="background: '.$color.'">
	            		<div class="fecha"><i class="mdi mdi-date_range"></i>29 Enero</div>
	                    <div class="mdl-card__supporting-text">
	                    	<div class="nombre-evento">
	                        	<p>'.$datos[$count1]->event_name.'</p>
	                    	</div>
	                    	<span id="vacantes1'.$count1.'"><i class="mdi mdi-keyboard_arrow_right"></i><i class="mdi mdi-keyboard_arrow_right second"></i><label>'.$datos[$count1]->vacantes.'</label> cupos</span>
	                    </div>
	                    <div class="mdl-card__actions text-right boton">
	                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" id="btnInscr1'.$count1.'" onclick="inscribir(1'.$count1.', 2, this);" '.$dato.'>Inscribir</button>
	                    </div>
	                </div>';
		    $count1++;
		}
		return $html;
	}

	function htmlDatos2() {
		$color = '';
		$dato = '';
		$datos = $this->M_eventos->getDatosEventos3();
		foreach ($datos as $key) {
			$existe = '';
			$existe = $this->M_eventos->verificarInscritos(_getSesion('Id'), $key->Id);
			if(count($existe) != 0) {
				$dato = 'disabled';
				$color = '#E0E0E0';
			}else {
				$color = '#fff';
			}
		}
		$html = null;
		$count2 = 0;
		foreach ($datos as $key) {
	            $html .= '<div class="mdl-card mdl-card-fecha cards3" id="card2'.$count2.'" style="background: '.$color.'">
	            		<div class="fecha"><i class="mdi mdi-date_range"></i>30 Enero</div>
	                    <div class="mdl-card__supporting-text">
	                    	<div class="nombre-evento">
	                    		<p>'.$datos[$count2]->event_name.'</p>
	                    	</div>
	                    	<span id="vacantes2'.$count2.'"><i class="mdi mdi-keyboard_arrow_right"></i><i class="mdi mdi-keyboard_arrow_right second"></i><label>'.$datos[$count2]->vacantes.'</label> cupos</span>
	                    </div>
	                    <div class="mdl-card__actions text-right boton">
	                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" id="btnInscr2'.$count2.'" onclick="inscribir(2'.$count2.', 3, this);" '.$dato.'>Inscribir</button>
	                    </div>
	                </div>';
		    $count2++;
		}
		return $html;
	}

	function inscribir() {
		$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
        	$vacantes = _post('vacantes');
        	$evento   = _post('evento');
        	$pant     = _post('pant');
        	if($pant == 1) {
        		$id_evento = $this->M_eventos->getDatosIdEventos($evento, '2018-01-15');
        	}else if($pant == 2) {
        		$id_evento = $this->M_eventos->getDatosIdEventos($evento, '2018-01-16');
        		//_logLastQuery();
        	}else if($pant == 3) {
        		$id_evento = $this->M_eventos->getDatosIdEventos($evento, '2018-01-17');
        	}
        	//_log($id_evento);
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
