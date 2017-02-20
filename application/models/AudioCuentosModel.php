<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AudioCuentosModel
 *
 * @author ORLANDO ALEXIS
 */
class AudioCuentosModel extends CI_Model{
    
    public function __construct(){
      parent::__construct();/*constructor de la clase padre Model*/
      $this->load->database();/*Permite accesos a la base de datos*/
      $this->load->library('session');
    }
    
    public function getAudioCuentos($id){
        $query = $this->db->query("select * from audiocuentos where gradoEscolar =".$id."");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $audio){
                $data[] = $audio;
            }
            return $data;
        }
        else{
            return FALSE;
        }
        
    }
     public function getCuento($id){
        $query = $this->db->query("select * from audiocuentos where id=".$id."");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $audio){
                $data[] = $audio;
            }
            return $data;
        }
        else{
            return FALSE;
        }
        
    }
    
    public function getGrados(){
        $query = $this->db->query("select * from gradoescolar");
        return $query->result_array();
    }
    public function getGradosId($id){
        $query = $this->db->query("select * from gradoescolar where id=".$id);
        return $query->result_array();
    }
    public function editar($titulo,$grado,$id,$audio){
        $data = array(
        'titulo' => $titulo,
        'gradoEscolar' => $grado,
        'Archivo' => $audio
        );
        $this->db->where('id', $id);
        $this->db->update('audiocuentos', $data);
    }
    public function uploadAudio($archivo,$titulo,$grado,$fecha){
        
        //$this->db->query("INSERT INTO audiocuentos ('Archivo','gradoEscolar','titulo','administrador','fecha') VALUES('$archivo',$grado,'$titulo',1,'$fecha')");
        $data = array(
	    'Archivo'=> $archivo,
	    'gradoEscolar'=>$grado,
	    'titulo'=>$titulo,
	    'administrador' =>$this->session->userdata('id'),
            'fecha' => $fecha
    	);
      	$this->db->insert('audiocuentos', $data);
    }
    
    public function getAudioCuentosByAdmin($admin){
        $query = $this->db->query("select a.id,a.titulo,a.fecha,a.Archivo,g.nombre from audiocuentos a inner join gradoescolar g on a.gradoEscolar = g.id where administrador = ".$admin."");
        return $query->result_array();
        
    }

    public function getAudioCuentosByAdminGral(){
        $query = $this->db->query("select a.id,a.titulo,a.fecha,a.Archivo,g.nombre,ad.nombre as adm from audiocuentos a inner join gradoescolar g on a.gradoEscolar = g.id inner join administrador as ad on a.administrador = ad.id");
        return $query->result_array();
        
    }
    
    public function getAudioCuentosNew($admin){
        $query = $this->db->query("select a.id,a.titulo,a.fecha,a.Archivo,g.nombre from audiocuentos a inner join gradoescolar g on a.gradoEscolar = g.id where administrador = ".$admin."");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $audio){
                $data[] = $audio;
            }
            return $data;
        }
        else{
            return FALSE;
        }
        
    }
    
    
    function deleteAudio($id,$admin){
        if($this->db->query("DELETE FROM audiocuentos where id = ".$id." && administrador = ".$admin."")){
            return TRUE;
        }
        return FALSE;
        

    }
    
    
    
}
