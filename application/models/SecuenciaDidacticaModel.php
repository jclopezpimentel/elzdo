<?php
     
defined('BASEPATH') OR exit('No direct script access allowed');
        // put your code here
    class SecuenciaDidacticaModel extends CI_Model {
        public function __construct() {
            parent::__construct();
        }
        
        public function subir($title,$pdf,$portada,$grado,$admi,$fecha){
            $data = array(
               
                'titulo' => $title,
                'pdf' => $pdf,
                'portada' => $portada,
                'gradoEscolar' => $grado,
                'administrador' => $admi,
                'fecha' => $fecha
            );
            $this->db->insert('secuenciasdidacticas',$data);
                
            
        }
        
        public function imagen(){
            $query = $this->db->query("select * from secuenciasdidacticas limit 1");
            return $query->result_array();
        }
        
        public function imagenSecuencia($id){
            $query = $this->db->query("select * from secuenciasdidacticas where id=".$id);
            return $query->result_array();
        }
    public function getGrados(){
        $query = $this->db->query("select * from gradoescolar");
        return $query->result_array();
    }
    public function getGradosId($id){
        $query = $this->db->query("select * from gradoescolar where id=".$id);
        return $query->result_array();
    }
    public function getSecuenciaGrado($id){
        $query = $this->db->query("select * from secuenciasdidacticas where gradoEscolar=".$id);
      if($query->num_rows() > 0){
          foreach ($query->result() as $fila){
              $data[] = $fila;
          }
          return $data;
      }else{
           return FALSE;
      }
    }
    
    public function getSD($admin){
        $query = $this->db->query("SELECT s.id,s.titulo,s.pdf,s.portada,g.nombre,s.fecha FROM secuenciasdidacticas as s INNER JOIN gradoescolar as g on s.gradoEscolar = g.id WHERE administrador = ".$admin."");
        return $query->result_array();
    }
    
    public function getSDGral(){
        $query = $this->db->query("SELECT s.id,s.titulo,s.pdf,s.portada,g.nombre,s.fecha,a.nombre as adm FROM secuenciasdidacticas as s INNER JOIN gradoescolar as g on s.gradoEscolar = g.id INNER JOIN administrador as a on s.administrador = a.id");
        return $query->result_array();
    }

    public function deleteSD($id){
        $this->db->where("id",$id)->delete("secuenciasdidacticas");
    }
    
    public function getSDNew($admin){
        $query = $this->db->query("SELECT s.id,s.titulo,s.pdf,s.portada,g.nombre,s.fecha FROM secuenciasdidacticas as s INNER JOIN gradoescolar as g on s.gradoEscolar = g.id WHERE administrador = ".$admin."");
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
    
    public function getSecuencias(){
        $query = $this->db->query("SELECT id,titulo from secuenciasdidacticas");
        return $query->result_array();
    }
    
    public function getSecuenciaById($id){
        $query = $this->db->query("SELECT id,titulo,pdf,portada,administrador,gradoEscolar FROM secuenciasdidacticas WHERE id = ".$id."");
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
    
    public function addGrado($grado){
        $data=  array(
            'nombre'=> $grado
        );
        $this->db->insert('gradoescolar',$data);
    }
    public function getGradosCont($name){
        $query = $this->db->query("select * from gradoescolar where nombre='".$name."'");
        return $query->num_rows();
    }
    public function editar($titulo,$gradoEscolar,$id,$pdf,$portada){
        $data = array(
        'titulo' => $titulo,
        'gradoEscolar' => $gradoEscolar,
        'pdf' => $pdf,
        'portada' => $portada
        );
        $this->db->where('id', $id);
        $this->db->update('secuenciasdidacticas', $data);
    }
    
    public function getGradosNew(){
         $sql = $this->db->query("SELECT * FROM gradoescolar");
         if ($sql->num_rows() > 0) {
            foreach ($sql->result() as $grados){
                $data[] = $grados;
            }
            return $data;
        }
        else{
            return FALSE;
        }
    }
     
    }
?>
