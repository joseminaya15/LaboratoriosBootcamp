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
                WHERE fecha = '2018-01-15'";
        $result = $this->db->query($sql, array());
        return $result->result();
    }

    function getDatosIdEventos($name) {
        $sql = "SELECT *
                  FROM eventos
                WHERE event_name = ?";
        $result = $this->db->query($sql, array($name));
        return $result->row()->Id;
    }

    function verificarInscritos($id) {
        $sql = "SELECT *
                  FROM inscritos
                WHERE id_pers = ?";
        $result = $this->db->query($sql, array($id));
        return $result->row()->Id;
    }
}