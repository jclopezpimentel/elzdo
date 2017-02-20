<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdmivideosModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function getcategoria(){
        $sql = $this->db->query("SELECT * FROM categoria");
        return $sql->result_array();
    }
    
    public function getvalores(){
        $sql = $this->db->query("SELECT * FROM valores");
        return $sql->result_array();
    }
    
    public function getcategoriaId($id){
        $sql = $this->db->query("SELECT * FROM categoria where id=".$id);
        return $sql->result_array();
    }
    
    public function getvaloresId($id){
        $sql = $this->db->query("SELECT * FROM valores where id=".$id);
        return $sql->result_array();
    }
    public function getvaloresCont($name){
        $sql = $this->db->query("SELECT * FROM valores where nombre='".$name."'");
        return $sql->num_rows();
    }
    public function getcategoriaCont($name){
        $sql = $this->db->query("SELECT * FROM categoria where categoria='".$name."'");
        return $sql->num_rows();
    }
    public function addvideo($titulo,$url,$categoria,$valores,$admi,$fecha){
        $data = array(
            'url' => $url,
            'titulo' => $titulo,
            'idCategoria' => $categoria,
            'idValores' => $valores,
            'administrador' => $admi,
            'fecha' => $fecha
        );
        return $this->db->insert('videos',$data);
    }
    
    public function valorcondition($categoria){
        $sql = $this->db->query("SELECT * FROM(SELECT DISTINCT v.idValores FROM categoria as c INNER JOIN videos as v ON c.id = v.idCategoria WHERE c.id=".$categoria.")as n INNER JOIN valores as val ON n.idValores = val.id");
        if($sql->num_rows() > 0){
            foreach ($sql->result() as $key){
                $data[]=$key;
            }
            return $data;
        }else{
            return FALSE;
        }
    }

 
    public function urlcondition($valore, $categoria){
        $sqi = $this->db->query("SELECT id,url,titulo FROM videos WHERE idCategoria = '$categoria' and idValores = '$valore' ORDER BY id DESC");
        if($sqi->num_rows()>0){
            foreach ($sqi->result() as $key) {
                $date[]=$key;
            }
            return $date;
        }else{
            return FALSE;
        }
    }    
    public function addValor($valor){
        $data=  array(
            'nombre'=> $valor
        );
        $this->db->insert('valores',$data);
    }
    public function addCategoria($categoria){
        $data=  array(
            'categoria'=> $categoria
        );
        $this->db->insert('categoria',$data);
    }
    public function getvaloresNew(){
         $sql = $this->db->query("SELECT * FROM valores");
         if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $valores){
                $data[] = $valores;
            }
            return $data;
        }
        else{
            return FALSE;
        }
    }
    
    public function getCategoriasNew(){
         $sql = $this->db->query("SELECT * FROM categoria");
         if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $categorias){
                $data[] = $categorias;
            }
            return $data;
        }
        else{
            return FALSE;
        }
    }


    public function listVideos(){
        $sql = $this->db->query("SELECT * FROM videos");
        return $sql->result_array();
    }
    public function listVideosId($id){
        $sql = $this->db->query("SELECT * FROM videos where administrador=".$id);
        return $sql->result_array();
    }
    public function listVideosGral(){
        $sql = $this->db->query("SELECT * FROM videos as v INNER JOIN administrador as a on v.administrador = a.id");
        return $sql->result_array();
    }
    public function listVideosMiniatura(){
        $sql = $this->db->query("SELECT * FROM videos ORDER BY id DESC");
        return $sql->result_array();
    }
    public function deleteVideo($id){
        $this->db->where('id',$id);
        $result = $this->db->delete('videos');
        $sql = $this->db->query("SELECT * FROM videos where administrador=".$this->session->userdata('id'));
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $videos){
                $data[] = $videos;
            }
            return $data;
        }
        else{
            return FALSE;
        }
    }
    public function getVideo($id){
        $sql = $this->db->query("SELECT * FROM videos where id=".$id);
        if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $videos){
                $data[] = $videos;
            }
            return $data;
        }
        else{
            return FALSE;
        }
    }
    public function editar($title,$url,$categoria,$valor,$id){
        $data = array(
        'url' => $url,
        'idCategoria' => $categoria,
        'idValores' => $valor,
        'titulo' => $title
        );
        $this->db->where('id', $id);
        $this->db->update('videos', $data);
    }
}