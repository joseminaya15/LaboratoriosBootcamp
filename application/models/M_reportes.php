<?php

class M_reportes extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getDatosInscritos() {
        $sql = 'SELECT e.Nombres,
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
                ORDER BY eve.fecha';
        $result = $this->db->query($sql, array());
        return $result->result();
    }

    function getDatosBuscador($dato) {
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
                   AND CASE WHEN ? IS NOT NULL THEN e.Nombres LIKE '%".$dato."%' ELSE TRUE END
                ORDER BY eve.fecha";
        $result = $this->db->query($sql, array($dato));
        return $result->result();
    }

    function getDatosBuscadorFecha($dato, $evento) {
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
                   AND CASE WHEN ? IS NOT NULL THEN eve.fecha = ?
                            WHEN ? IS NOT NULL THEN eve.event_name LIKE '%".$evento."%' ELSE TRUE END
                ORDER BY eve.fecha";
        $result = $this->db->query($sql, array($dato, $dato, $evento));
        return $result->result();
    }

    function getDatosBuscadorEvento($dato, $fecha) {
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
                   AND CASE WHEN ? IS NOT NULL THEN eve.event_name LIKE '%".$dato."%'
                            WHEN ? IS NOT NULL THEN eve.fecha = ? ELSE TRUE END
                ORDER BY eve.fecha";
        $result = $this->db->query($sql, array($dato, $fecha, $fecha));
        return $result->result();
    }
}