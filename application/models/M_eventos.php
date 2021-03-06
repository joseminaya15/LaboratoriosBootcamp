<?php

class M_eventos extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function insertarDatos($arrayInsert, $tabla){
        $this->db->insert($tabla, $arrayInsert);
        $sol = $this->db->insert_id();
        if($this->db->affected_rows() != 1) {
            throw new Exception('Error al insertar');
            $data['error'] = EXIT_ERROR;
        }
        return array("error" => EXIT_SUCCESS, "msj" => MSJ_INS, "Id" => $sol);
    }

    function updateDatos($arrayData, $id, $tabla){
        $this->db->where('Id'  , $id);
        $this->db->update($tabla, $arrayData);
        if ($this->db->trans_status() == false) {
            throw new Exception('No se pudo actualizar los datos');
        }
        return array('error' => EXIT_SUCCESS,'msj' => MSJ_UPT);
    }

    function getDatosEventos() {
        $sql = "SELECT *
                  FROM eventos
                WHERE fecha = '2018-01-30'";
        $result = $this->db->query($sql, array());
        return $result->result();
    }

    function getDatosEventos3() {
        $sql = "SELECT *
                  FROM eventos
                WHERE fecha = '2018-02-01'";
        $result = $this->db->query($sql, array());
        return $result->result();
    }

    function getDatosEventos2() {
        $sql = "SELECT *
                  FROM eventos
                WHERE fecha = '2018-01-31'";
        $result = $this->db->query($sql, array());
        return $result->result();
    }

    function getDatosIdEventos($name, $fecha) {
        $sql = "SELECT *
                  FROM eventos
                WHERE event_name = ?
                  AND fecha = ?";
        $result = $this->db->query($sql, array($name, $fecha));
        return $result->row()->Id;
    }

    function verificarInscritos($id, $id_evento) {
        $sql = "SELECT *
                  FROM inscritos
                WHERE id_pers = ?
                  AND id_evento = ?";
        $result = $this->db->query($sql, array($id, $id_evento));
        return $result->result();
    }

    function getDatosInscritos() {
        $sql = "SELECT e.Nombres,
                       e.Apellidos,
                       e.Pais,
                       e.Email,
                       eve.event_name,
                       eve.fecha
                  FROM emails e,
                       inscritos i,
                       eventos eve
                 WHERE e.Id = i.id_pers
                   AND i.id_evento = eve.Id
                ORDER BY eve.fecha";
        $result = $this->db->query($sql, array($id, $id_evento));
        return $result->result();
    }
}