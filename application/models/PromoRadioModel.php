<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PromoRadioModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function AddpodcastBD($rutadestino,$titulo,$descripcion,$administrador,$fecha){
        $data=array(
            'podcast' => $rutadestino,
            'titulo' => $titulo,
            'descripcion' => $descripcion,
            'administrador' => $administrador,
            'fechar' => $fecha
        );
        $this->db->insert('promoradio',$data);
    }
    
    public function listPodcast(){
        $sql = $this->db->query("SELECT * FROM promoradio ORDER BY id DESC");
        return $sql->result_array();
    }
    
    public function BDidPodcast($id){
        $result=$this->db->query("SELECT * FROM promoradio WHERE id ='$id'");
        if($result->num_rows()>0){
            foreach ($result->result() as $key) {
                $date[] = $key;
            }
            return $date;
        }else{
            return FALSE;
        }
    }
    
    public function BDtablepodcast($admin){
        //$usuario = 1;
        $sql = $this->db->query("SELECT * FROM promoradio WHERE administrador = '$admin' ORDER BY id DESC");
        return $sql->result_array();
    }
    public function BDtablepodcastGral(){
        //$usuario = 1;
        $sql = $this->db->query("SELECT p.id,p.titulo,p.descripcion,p.fechar,a.nombre FROM promoradio as p INNER JOIN administrador as a on p.administrador = a.id ORDER BY id DESC");
        return $sql->result_array();
    }
    public function getPodcastNew($admin){
        $query = $this->db->query("SELECT * FROM promoradio WHERE administrador = '$admin' ORDER BY id DESC");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $podcast){
                $data[] = $podcast;
            }
            return $data;
        }
        else{
            return FALSE;
        }
        
    }
    
    public function BDdelete($id){
        $this->db->where('id',$id);
        $result = $this->db->delete('promoradio');
    }


    public function editar($titulo,$descripcion,$id,$podcast){
        $data = array(
        'titulo' => $titulo,
        'descripcion' => $descripcion,
        'podcast' => $podcast
        );
        $this->db->where('id', $id);
        $this->db->update('promoradio', $data);
    }
}