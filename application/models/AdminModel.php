<?php

class AdminModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    
    function login($email,$password) {
        $query = $this->db->select('*');
        $query = $this->db->from('administrador a');
        $query = $this->db->join('privilegios p', 'a.id = p.idAdministrador');
        $query = $this->db->where("correo",$email);
        $query = $this->db->where("password",$password);
        $query = $this->db->get();
        return $query;
    }
    function verificarEmail($email){
        $query = $this->db->select('*');
        $query = $this->db->from('administrador');
        $query = $this->db->where("correo",$email);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function setAdmin($nombre,$correo,$contasena,$tipo,$name,$descripcion,$sd,$ed,$cn,$lb,$ac,$pr,$vd){
        $datos = array(
            'nombre' => $nombre,
            'correo' => $correo,
            'password' => $contasena,
            'foto' => $name,
            'tipo' => $tipo,
            'descripcion'  => $descripcion
        );
        $this->db->insert('administrador',$datos);
        $query = $this->db->select('*');
        $query = $this->db->from('administrador');
        $query = $this->db->where("correo",$correo);
        $query = $this->db->where("password",$contasena);
        $query = $this->db->get();
        $id;
        foreach ($query->result() as $fila){
            $id = $fila->id;
        }
        
        $privilegios = array(
            'idAdministrador' => $id,
            'SD' => $sd,
            'ED' => $ed,
            'PR' => $pr,
            'AC' => $ac,
            'VD' => $vd,
            'CN' => $cn,
            'LB' => $lb
        );
        
        return $this->db->insert('privilegios',$privilegios);
        
    }
    public function getAdministradores(){
        $query = $this->db->query("select id,nombre from administrador");
        return $query->result_array();
    }
    
    public function getPrivilegios($id){
        $query = $this->db->query("select * from privilegios WHERE idAdministrador = ".$id);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $priv){
                $data[] = $priv;
            }
            return $data;
        }
        else{
            return FALSE;
        }
    }
    
    public function updatePrivilegios($id,$data){
        $this->db->where('idAdministrador', $id);
        return $this->db->update('privilegios', $data);
    }
    public function getAdmins($id){
        $query = $this->db->query("select * from administrador where id != ".$id."");
        return $query->result_array();
    }
    
    public function getInfoById($id){
        $query = $this->db->query("select * from administrador WHERE id = ".$id."");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $adm){
                $data[] = $adm;
            }
            return $data;
        }
        else{
            return FALSE;
        }
        return $query;
    }
    
    public function deleteAdmById($id){
        $this->db->where('idAdministrador',$id);
        $this->db->delete('privilegios');
        $this->db->where('id',$id);
        return $this->db->delete('administrador');
    }
    public function Historial($disco,$seccion,$id,$fecha,$idadm) {
        $history = array(
            'idregistrado' => $id,
            'seccion' => $seccion,
            'idRecurso' => $disco,
            'fecha' => $fecha,
            'idadmin' => $idadm
        );
        
        return $this->db->insert('historial',$history);
        
    }
    public function getInfo($id){
        $query = $this->db->query("select * from administrador WHERE id = ".$id);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $adm){
                $data[] = $adm;
            }
            return $data;
        }
        else{
            return FALSE;
        }
    }
    
    public function updateInfo($id,$data){
        $this->db->where('id', $id);
        return $this->db->update('administrador', $data);
    }
    
}

?>