<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of historialModel
 *
 * @author Arcos
 */

class HistorialModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function history($seccion,$tabla,$campo) {
        $query = $this->db->select('r.nombre,h.seccion,h.fecha, m.'.$campo.' as recurso');
        $query = $this->db->from('historial h');
        $query = $this->db->join('registrado r', 'r.id = h.idregistrado');
        $query = $this->db->join($tabla.' m', 'm.id = h.idRecurso');
        if($this->session->userdata('tipo') == "Recursos"){
            $query = $this->db->where("h.idadmin",$this->session->userdata('id'));
        }
        $query = $this->db->where("h.seccion",$seccion);
        $query = $this->db->get();
        if($query->num_rows()>0){
            foreach ($query->result() as $key) {
                $data[]=$key;
            }
            return $data;
        }else{
            return FALSE;
        }
    }
}