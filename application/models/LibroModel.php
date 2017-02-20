<?php

class LibroModel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function get_libro($admin)
    {
    	$libros = $this->db->query("select * from libro where administrador =".$admin);
    	return $libros->result_array();
    }

    public function get_libroGral()
    {
        $libros = $this->db->query("select * from libro");
        return $libros->result_array();
    }
    public function set_libro($titulo,$nombreLib,$descripcion,$nombreImg,$administrador,$fecha){
        $arrayName = array('titulo' => $titulo,
                        'pdf' => $nombreLib,
                        'Descripcion' => $descripcion,
                        'imagen' => $nombreImg,
                        'administrador' => $administrador,
                        'fecha' => $fecha
                        );
        $this->db->insert('libro',$arrayName);
    }
    
    public function consult($id){
        $libros = $this->db->query("select * from libro as l inner join administrador as a on l.administrador=a.id where l.id='$id'");
    	return $libros->result_array();
    }
    
    public function getLibro($id){
        $query = $this->db->query("select * from libro where id='$id'");
        if($query->num_rows() > 0){
          foreach ($query->result() as $fila){
              $data[] = $fila;
          }
          return $data;
      }else{
           return FALSE;
      }
    }

    public function deleteLibro($id){
        $this->db->where('id',$id);
        return $this->db->delete('libro');
    }

    public function editar($title,$descripcion,$id,$pdf,$imagen){
        $data = array(
        'titulo' => $title,
        'Descripcion' => $descripcion,
        'pdf' => $pdf,
        'imagen' => $imagen
        );
        $this->db->where('id', $id);
        $this->db->update('libro', $data);
    }
}

?>