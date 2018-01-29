<?php

class M_reportes extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function getDatosInscritos() {
        $sql = "SELECT CONCAT(e.Nombres, ' ', e.Apellidos) AS nombre_completo,
                       e.Email,
                       DATE_FORMAT(ev.fecha,'%d/%m/%Y') AS fecha,
                       group_concat(ev.event_name ) as evento
                  FROM laboratoriosbootcamp.inscritos i,
                       laboratoriosbootcamp.emails e,
                       laboratoriosbootcamp.eventos ev
                 WHERE i.id_evento = ev.Id
                   AND i.id_pers = e.Id
                GROUP BY e.Id
                ORDER BY ev.fecha, ev.event_name";
        $result = $this->db->query($sql, array());
        return $result->result();
    }
}