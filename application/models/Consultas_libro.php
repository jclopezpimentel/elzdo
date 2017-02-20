<?php

class Consultas_libro extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    public function get_libro()
    {
    	$libros = $this->db->query("select * from libro");
    	return $libros->result_array();
    }

    public function set_libro( $titulo , $nombreLib,$descripcion,$nombreImg,$administrador,$fecha){
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
        $libros = $this->db->query("select * from libro where id='$id'");
    	return $libros->result_array();
    }
    
    public function deleteLibro($id){
        $this->db->where('id',$id);
        return $this->db->delete('libro');
    }
    
    public function filter($palabra){
        $libros = $this->db->query("SELECT * FROM libro WHERE titulo LIKE '%$palabra%' OR Descripcion LIKE '%$palabra%'");
    	return $libros->result_array();
    }
            
}

?>