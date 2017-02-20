<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CancionesModel extends CI_Model{

  public function __construct(){
      parent::__construct();/*constructor de la clase padre Model*/
      $this->load->database();/*Permite accesos a la base de datos*/
      $this->load->library('session');
  }

  public function listar_grados(){

    $query = $this->db->query("select * from gradoescolar");
    if($query->num_rows() > 0){
        return $query->result_array();
    }else{
        return FALSE;
    }
  }
  
  public function getMusica($param){
      $query = $this->db->query("select * from canciones where idDisco=".$param);
      if($query->num_rows() > 0){
        return $query->result_array();
    }else{
        return FALSE;
    }
  }
  public function getCanciones($param){
      $query = $this->db->query("select * from canciones where idDisco=".$param);
      if($query->num_rows() > 0){
        return $query->result_array();
    }else{
        return 0;
    }
  }
  public function getCancion($id){
      $query = $this->db->query("select * from canciones where id=".$id);
      if($query->num_rows() > 0){
        return $query->result_array();
      }else{
          return FALSE;
      }
  }

  public function getCancionFb($id){
      $query = $this->db->query("select * from canciones where id=".$id);
      if($query->num_rows() > 0){
          foreach ($query->result() as $fila){
              $data[] = $fila;
          }
          return $data;
      }else{
           return FALSE;
      }
  }
  public function getGradosId($id){
        $query = $this->db->query("select * from gradoescolar where id=".$id);
        return $query->result_array();
    }

  public function editar($nombre,$autor,$descripcion,$grado,$id,$imagen){
        $data = array(
        'nombre' => $nombre,
        'autor' => $autor,
        'descripcion' => $descripcion,
        'gradoEscolar' => $grado,
        'imagen' => $imagen
        );
        $this->db->where('id', $id);
        $this->db->update('disco', $data);
    }


  public function getMusic($param){
      $query = $this->db->query("select * from canciones where idDisco=".$param);
      if($query->num_rows() > 0){
          foreach ($query->result() as $fila){
              $data[] = $fila;
          }
          return $data;
    }else{
        return FALSE;
    }
  }
  public function getDisco($id) {
      $query = $this->db->query("select * from disco where id=".$id);
      if($query->num_rows() > 0){
          foreach ($query->result() as $fila){
              $data[] = $fila;
          }
          return $data;
      }else{
           return FALSE;
      }
  }
  public function getDiscoGrado($id) {
      $query = $this->db->query("select * from disco where gradoEscolar=".$id);
      if($query->num_rows() > 0){
          foreach ($query->result() as $fila){
              $data[] = $fila;
          }
          return $data;
      }else{
           return FALSE;
      }
  }

  public function getDiscos() {
      $query = $this->db->query("select * from disco");
      return $query;
  }
  public function getDiscoAdmin($admin){
      $query = $this->db->query("SELECT d.id ,d.nombre as nombreDisco, d.autor, g.nombre, d.fecha,d.zip FROM disco d inner join gradoescolar g on d.gradoEscolar = g.id WHERE administrador = ".$admin."");
          return $query->result_array();
  }
  public function getDiscoAdminGral() {
      $query = $this->db->query("SELECT d.id ,d.nombre as nombreDisco, d.autor, g.nombre, d.fecha,d.zip,a.nombre as admin FROM disco d inner join gradoescolar g on d.gradoEscolar = g.id inner join administrador as a on d.administrador=a.id");
          return $query->result_array();
  }
  public function getDiscoNew($admin){
       $query = $this->db->query("SELECT d.id as id ,d.nombre as nombreDisco, d.autor as autor, g.nombre as nombre, d.fecha as fecha, d.zip as zip FROM disco d inner join gradoescolar g on d.gradoEscolar = g.id WHERE administrador = ".$admin."");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $sdida){
                $data[] = $sdida;
                
            }
            return $data;
        }
        else{
            return FALSE;
        }
  }

  public function crear_disco($disco,$autor,$grado,$id,$fecha,$portada,$descripcion,$url_zip) {
      $data = array(
          'nombre' => $disco,
          'autor' => $autor,
          'gradoEscolar' => $grado,
          'administrador' => $id,
          'fecha' => $fecha,
          'imagen' => $portada,
          'descripcion' => $descripcion,
          'zip' => $url_zip
      );
      $this->db->insert('disco', $data);
      $query = $this->db->query("select id from disco where nombre='".$disco."'");
      $row = $query->row();
      $idDisco = $row->id;
      return $idDisco;
      
  }
  function crear_cancion($ruta,$titulo,$idDisco) {
      $data = array(
          'archivo' => $ruta,
          'titulo' => $titulo,
          'idDisco' => $idDisco
      );
      $this->db->insert('canciones', $data);
  }
  public function getPath($id){
      $query = $this->db->query("select * from disco where id=".$id);
      if($query->num_rows() > 0){
          foreach ($query->result() as $fila){
              $data[] = $fila;
          }
          return $data;
    }else{
        return FALSE;
    }
  }
  public function delete_disco($id) {
      $this->db->where('id',$id);
      return $this->db->delete('disco');
      
  }
  public function delete_canciones($id){
      $this->db->where('idDisco',$id);
      return $this->db->delete('canciones');
  }
  public function delete_cancion($id){
      $this->db->where('id',$id);
      return $this->db->delete('canciones');
  }
}

