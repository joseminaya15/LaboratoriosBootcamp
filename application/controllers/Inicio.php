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
		$data['apellidos'] = _getSesion('Apellidos');
		$data['fecha']   = $datos[0]->fecha;
		//$html_datos1     = $this->htmlDatos1();
	    $data['html1']   = $this->htmlDatos1();
		$data['html']    = $html_datos;
		$data['html2']   = $this->htmlDatos2();
		$this->load->view('v_index', $data);
	}

	function htmlDatos() {
		$color = '';
		$dato = '';
		$id_inscrt = '';
		$color_text = ''; 
		$nombre_event = '';
		$boton = 'Reserve';
		$datos = $this->M_eventos->getDatosEventos();
		foreach ($datos as $key) {
			$existe = '';
			$existe = $this->M_eventos->verificarInscritos(_getSesion('Id'), $key->Id);
			if(count($existe) != 0) {
				$dato = 'disabled';
				$color = '#E0E0E0';
				$id_inscrt = $existe[0]->id_evento;
			}
		}
		$html = null;
		$count = 0;
		foreach ($datos as $key) {
			   if($datos[$count]->Id == $id_inscrt) {
			   		$boton = 'Reserved';
			   		$color_text = '#000';
			   		$nombre_event = $datos[$count]->event_name;
			   }else {
			   		$boton = 'Reserve';
			   		$color_text = ''; 
			   }
		       $html .= '<div class="mdl-card mdl-card-fecha cards1" id="card'.$count.'" style="background: '.$color.'">
		                    <div class="mdl-card__supporting-text">
		                    	<div class="nombre-evento">
		                        	<p>'.$datos[$count]->event_name.'</p>
		                    	</div>
		                        <span id="vacantes'.$count.'"><i class="mdi mdi-keyboard_arrow_right"></i><i class="mdi mdi-keyboard_arrow_right second"></i><label>'.$datos[$count]->vacantes.'</label> seats</span> 
		                    </div>
		                    <div class="mdl-card__actions boton">
		                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="color: '.$color_text.'" id="btnInscr'.$count.'" onclick="inscribir('.$count.', 1, this);" '.$dato.'>'.$boton.'</button>
		                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-modificar" id="btnmodificar'.$count.'" disabled onclick="modificar('.$count.', 1, this)">Undo</button>
		                    </div>
		                </div>';
		    $count++;
		}
		return $html;
	}

	function htmlDatos1() {
		$color = '';
		$dato = '';
		$id_inscrt = '';
		$color_text = ''; 
		$nombre_event = '';
		$boton = 'Reserve';
		$datos = $this->M_eventos->getDatosEventos2();
		foreach ($datos as $key) {
			$existe = '';
			$existe = $this->M_eventos->verificarInscritos(_getSesion('Id'), $key->Id);
			if(count($existe) != 0) {
				$dato = 'disabled';
				$color = '#E0E0E0';
				$id_inscrt = $existe[0]->id_evento;
			}
		}
		$html = null;
		$count1 = 0;
		foreach ($datos as $key) {
				if($datos[$count1]->Id == $id_inscrt) {
			   		$boton = 'Reserved';
			   		$color_text = '#000';
			   		$nombre_event = $datos[$count1]->event_name;
				}else {
				    $boton = 'Reserve';
				    $color_text = '';
				}
	            $html .= '<div class="mdl-card mdl-card-fecha cards2" id="card1'.$count1.'" style="background: '.$color.'">
	                    <div class="mdl-card__supporting-text">
	                    	<div class="nombre-evento">
	                        	<p>'.$datos[$count1]->event_name.'</p>
	                    	</div>
	                    	<span id="vacantes1'.$count1.'"><i class="mdi mdi-keyboard_arrow_right"></i><i class="mdi mdi-keyboard_arrow_right second"></i><label>'.$datos[$count1]->vacantes.'</label> seats</span>
	                    </div>
	                    <div class="mdl-card__actions boton">
	                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="color: '.$color_text.'" id="btnInscr1'.$count1.'" onclick="inscribir(1'.$count1.', 2, this);" '.$dato.'>'.$boton.'</button>
	                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-modificar" id="btnmodificar1'.$count1.'" disabled onclick="modificar(1'.$count1.', 2, this)">Undo</button>
	                    </div>
	                </div>';
		    $count1++;
		}
		return $html;
	}

	/*function htmlDatos2() {
		$color = '';
		$dato = '';
		$id_inscrt = '';
		$color_text = ''; 
		$boton = 'Reserve';
		$new_boton = '';
		$html = null;
		$count2 = 0;
		$count_2 = 0;
		$datos = $this->M_eventos->getDatosEventos3();
		$existe = $this->M_eventos->verificarInscritos(_getSesion('Id'), _getSesion('id_evento'));
		if(_getSesion('id_evento') > 11 && count($existe) != 0) {
			foreach ($datos as $key) {
				$dato = 'disabled';
				$color = '#E0E0E0';
				if($key->Id == $existe[0]->id_evento) {
					$boton = 'Reserved';
					$color_text = '#000';
				}else {
					$boton = 'Reserve';
					$color_text = '';
				}
				$html .= '<div class="mdl-card mdl-card-fecha cards3" id="card2'.$count2.'" style="background: '.$color.'">
		                    <div class="mdl-card__supporting-text">
		                    	<div class="nombre-evento">
		                    		<p>'.$datos[$count2]->event_name.'</p>
		                    	</div>
		                    	<span id="vacantes2'.$count2.'"><i class="mdi mdi-keyboard_arrow_right"></i><i class="mdi mdi-keyboard_arrow_right second"></i><label>'.$datos[$count2]->vacantes.'</label> seats</span>
		                    </div>
		                    <div class="mdl-card__actions boton">
		                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="color: '.$color_text.'" id="btnInscr2'.$count2.'" onclick="inscribir(2'.$count2.', 3, this);" '.$dato.'>'.$boton.'</button>
		                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-modificar" disabled onclick="modificar()">Undo</button>
		                    </div>
		                </div>';
		                $count2++;
			}
		}else {
			foreach ($datos as $key2) {
				if(trim($key2->event_name) == trim(_getSesion('nombre_antiguo')) || trim($key2->event_name) == trim(_getSesion('nombre_event'))) {
		   			$dato = 'disabled';
					$color = '#E0E0E0';
					$color_text = '';
					$boton = 'Reserve';
		   		}else {
		   			$dato = '';
					$color = '';
		   		}
		   		$html .= '<div class="mdl-card mdl-card-fecha cards3" id="card2'.$count_2.'" style="background: '.$color.'">
		                    <div class="mdl-card__supporting-text">
		                    	<div class="nombre-evento">
		                    		<p>'.$key2->event_name.'</p>
		                    	</div>
		                    	<span id="vacantes2'.$count_2.'"><i class="mdi mdi-keyboard_arrow_right"></i><i class="mdi mdi-keyboard_arrow_right second"></i><label>'.$datos[$count_2]->vacantes.'</label> seats</span>
		                    </div>
		                    <div class="mdl-card__actions boton">
		                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="color: '.$color_text.'" id="btnInscr2'.$count_2.'" onclick="inscribir(2'.$count_2.', 3, this);" '.$dato.'>'.$boton.'</button>
		                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-modificar" disabled onclick="modificar()">Undo</button>
		                    </div>
		                </div>';
		        $count_2++;
	   		}
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
        	$select   = _post('select');
        	
        	if($pant == 1) {
        		$id_evento = $this->M_eventos->getDatosIdEventos($evento, '2018-01-30');
        	}else if($pant == 2) {
        		$id_evento = $this->M_eventos->getDatosIdEventos($evento, '2018-01-31');
        	}else if($pant == 3) {
        		$id_evento = $this->M_eventos->getDatosIdEventos($evento, '2018-02-01');
        	}
        	$updt = array('vacantes' => $vacantes);
        	$updt_datos = $this->M_eventos->updateDatos($updt, $id_evento, 'eventos');
        	$arrayInsert = array('id_evento' => $id_evento,
        						 'id_pers'   => _getSesion('Id'),
        						 'reserva_nro' => $select);
        	$this->M_eventos->insertarDatos($arrayInsert, 'inscritos');

        	$session = array('id_evento' => $id_evento,
								 'evento' => $evento);
          	$this->session->set_userdata($session);
        	$data['error'] = EXIT_SUCCESS;
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}*/

	function htmlDatos2() {
		$color = '';
		$dato = '';
		$id_inscrt = '';
		$color_text = ''; 
		$nombre_event = '';
		$boton = 'Reserve';
		$datos = $this->M_eventos->getDatosEventos3();
		foreach ($datos as $key) {
			$existe = '';
			$existe = $this->M_eventos->verificarInscritos(_getSesion('Id'), $key->Id);
			if(count($existe) != 0) {
				$dato = 'disabled';
				$color = '#E0E0E0';
				$id_inscrt = $existe[0]->id_evento;
			}
		}
		$html = null;
		$count1 = 0;
		foreach ($datos as $key) {
				if($datos[$count1]->Id == $id_inscrt) {
			   		$boton = 'Reserved';
			   		$color_text = '#000';
			   		$nombre_event = $datos[$count1]->event_name;
				}else {
				    $boton = 'Reserve';
				    $color_text = '';
				}
	            $html .= '<div class="mdl-card mdl-card-fecha cards3" id="card2'.$count1.'" style="background: '.$color.'">
	                    <div class="mdl-card__supporting-text">
	                    	<div class="nombre-evento">
	                        	<p>'.$datos[$count1]->event_name.'</p>
	                    	</div>
	                    	<span id="vacantes2'.$count1.'"><i class="mdi mdi-keyboard_arrow_right"></i><i class="mdi mdi-keyboard_arrow_right second"></i><label>'.$datos[$count1]->vacantes.'</label> seats</span>
	                    </div>
	                    <div class="mdl-card__actions boton">
	                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" style="color: '.$color_text.'" id="btnInscr2'.$count1.'" onclick="inscribir(2'.$count1.', 3, this);" '.$dato.'>'.$boton.'</button>
	                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-modificar" id="btnmodificar2'.$count1.'" disabled onclick="modificar(2'.$count1.', 3, this)">Undo</button>
	                    </div>
	                </div>';
		    $count1++;
		}
		return $html;
	}


	function gotoLogin() {
		$data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
        	$respuestas = _post('respuestas');
        	$vacantes   = _post('vacantes');
        	$array_ids  = array();
        	$count 		= 0;
    		$id_evento1 = $this->M_eventos->getDatosIdEventos($respuestas[0], '2018-01-30');
    		$id_evento2 = $this->M_eventos->getDatosIdEventos($respuestas[1], '2018-01-31');
    		$id_evento4 = $this->M_eventos->getDatosIdEventos($respuestas[2], '2018-02-01');
    		array_push($array_ids, $id_evento1, $id_evento2, $id_evento4);
        	foreach ($array_ids as $id_evento) {
        		$updt = array('vacantes' => $vacantes[$count]);
        		$updt_datos = $this->M_eventos->updateDatos($updt, $id_evento, 'eventos');
        		$arrayInsert = array('id_evento' => $id_evento,
        						 	 'id_pers'   => _getSesion('Id'));
        		$this->M_eventos->insertarDatos($arrayInsert, 'inscritos');
        		$count++;
        	}
        	$data['error'] = EXIT_SUCCESS;
        }catch(Exception $e) {
           $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
	}

}
