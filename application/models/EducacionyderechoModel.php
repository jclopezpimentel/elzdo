<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EducacionyderechoModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function insetarforo($imagen,$pdfPath,$title,$descripcion,$adminis,$fecha){
        $data = array(
            'imagen' => $imagen,
            'pdfPath' => $pdfPath,
            'titulo' => $title,
            'descripcion' => $descripcion,
            'administrador' => $adminis,
            'fecha' => $fecha
        );
        $this->db->insert('educacionyderechos',$data);
       // $sql = $this->db->query("INSERT INTO educacionyderechos (imagen, titulo, id_foro, administrador, fecha) VALUES('".$rutaDestino."', '".$title."', '".$idforo."','".$adminis."','".$fecha."')");
    }

    public function deleteForo($id){
        //$this->db->query("DELETE FROM educacionyderechos");
        $this->db->where("id",$id)->delete("educacionyderechos");
    }
    
    public function getEducacionNew($admin){
        $query = $this->db->query("select * from educacionyderechos where administrador = ".$admin."");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $educacion){
                $data[] = $educacion;
            }
            return $data;
        }
        else{
            return FALSE;
        }
        
    }
    public function getEducacionId($id){
        $query = $this->db->query("select * from educacionyderechos where id= ".$id);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $educacion){
                $data[] = $educacion;
            }
            return $data;
        }
        else{
            return FALSE;
        }
        
    }
    public function editar($titulo,$descripcion,$id,$pdf,$portada){
        $data = array(
        'titulo' => $titulo,
        'descripcion' => $descripcion,
        'pdfPath' => $pdf,
        'imagen' => $portada
        );
        $this->db->where('id', $id);
        $this->db->update('educacionyderechos', $data);
    }
    
    
    public function generarforo($admin){
        $sql = $this->db->query("SELECT * FROM educacionyderechos where administrador =".$admin."");
        return $sql->result_array();
    }
    public function generarforoGral(){
        $sql = $this->db->query("SELECT e.id,e.imagen,e.titulo,e.fecha,e.descripcion,a.nombre FROM educacionyderechos as e INNER JOIN administrador as a on e.administrador = a.id");
        return $sql->result_array();
    }
    public function generarforo2(){
        $sql = $this->db->query("SELECT * FROM educacionyderechos");
        return $sql->result_array();
    }

    public function buscarId($id){
        //$this->load->database();
        $this->db->select('*');
        $this->db->from('educacionyderechos');
        $this->db->where('id', $id );
        $query = $this->db->get();
        if ( $query->num_rows() > 0 )
        {
            $row = $query->row_array();
            return $row;
        }
    }
}