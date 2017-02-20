<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosModel extends CI_Model{

  public function __construct(){
      parent::__construct();/*constructor de la clase padre Model*/
      $this->load->database();/*Permite accesos a la base de datos*/
      $this->load->library('session');
  }
  
  function login($email,$password) {
      $query = $this->db->select('*');
        $query = $this->db->from('registrado');
        $query = $this->db->where("email",$email);
        $query = $this->db->where("contrasena",$password);
        $query = $this->db->get();
        return $query;
  }
  
  function registrar_usuario($nombre,$email,$password,$grado,$e,$m,$p,$fecha,$tipo) {
      $data = array(
          'nombre' => $nombre,
          'email' => $email,
          'contrasena' => $password,
          'gradoEstudios' => $grado,
          'ocupacionEstudiante' => $e,
          'ocupacionMaestro' => $m,
          'ocupacionPadreFamilia' => $p,
          'activo' => 1,
          'fecha' => $fecha,
          'tipoCta' => $tipo
      );
      return $this->db->insert('registrado', $data);
  }
    function verificarEmail($email){
    $query = $this->db->select('*');
    $query = $this->db->from('registrado');
    $query = $this->db->where("email",$email);
    $query = $this->db->get();
    return $query->num_rows();
  }
   function verificarEmailReset($email){
    $query = $this->db->select('*');
    $query = $this->db->from('registrado');
    $query = $this->db->where("email",$email);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        foreach ($query->result() as $key){
            $data[]=$key;
        }
        return $data;
    }else{
        return FALSE;
    }
  }

  function resetpass($id,$username,$token,$creado) {
      $data = array(
          'idusuario' => $id,
          'username' => $username,
          'token' => $token,
          'creado' => $creado
      );
      return $this->db->insert('tblreseteopass', $data);
  }
  function verificarToken($token){
      $query = $this->db->select('*');
      $query = $this->db->from('tblreseteopass');
      $query = $this->db->where("token",$token);
      $query = $this->db->get();
      return $query->num_rows();
  }
  function verificarTokenReset($token){
      $query = $this->db->select('*');
      $query = $this->db->from('tblreseteopass');
      $query = $this->db->where("token",$token);
      $query = $this->db->get();
      if($query->num_rows() > 0){
          foreach ($query->result() as $key){
              $data[]=$key;
          }
          return $data;
      }else{
          return FALSE;
      }
  }

  function updateInfoAdicional($id,$grado,$ocupacion) {
      $e = 0;
      $m = 0;
      $p = 0;
      switch ($ocupacion){
            case 0:
                break;
            case 1:
                $e = 1;
                break;
            case 2:
                $m = 1;
                break;
            case 3:
                $p = 1;
                break;
        }
      $data = array(
            'gradoEstudios' => $grado,
            'ocupacionEstudiante' => $e,
            'ocupacionMaestro' => $m,
            'ocupacionPadreFamilia' => $p
        );
        $this->db->where('id', $id);
        return $this->db->update('registrado', $data);
         
  }
  function updateReset($token) {
      $data = array(
            'token' => $token,
        );
        $this->db->where('token', $token);
        return $this->db->update('tokens', $data); 
  }
  function resetpassToken($token){
      $data = array(
            'token' => $token,
        );
      return $this->db->insert('tokens', $data);
  }
  function deleteResetToken($token){
      $this->db->where('token',$token);
      return $this->db->delete('tokens');
  }
  function updateInfoPass($id,$actual,$nueva) {
    $query = $this->db->select('*');
    $query = $this->db->from('registrado');
    $query = $this->db->where("id",$id);
    $query = $this->db->where("contrasena",$actual);
    $query = $this->db->get();
    
    if($query->num_rows() > 0){
        $data = array(
              'contrasena' => $nueva
        );
        $this->db->where('id', $id);
        return $this->db->update('registrado', $data);
    }else{
        return false;
    }      
  }
  function updateInfoPassReset($id,$nueva){
        $data = array(
              'contrasena' => $nueva
        );
        $this->db->where('id', $id);
        return $this->db->update('registrado', $data);      
  }
  function updateInfoPassResetAdmin($id,$nueva){
        $data = array(
              'password' => $nueva
        );
        $this->db->where('id', $id);
        return $this->db->update('administrador', $data);      
  }
  function deleteReset($token){
      $this->db->where('token',$token);
      return $this->db->delete('tblreseteopass');
  }
  
  function log_registro($tipo,$autor,$fecha) {
      $data = array(
          'tipo' => $tipo,
          'autor' => $autor,
          'fecha' => $fecha
      );
      $this->db->insert('log_session', $data);
  }



   function verificarEmailAdmin($email){
    $query = $this->db->select('*');
    $query = $this->db->from('administrador');
    $query = $this->db->where("correo",$email);
    $query = $this->db->get();
    return $query->num_rows();
  }
   function verificarEmailResetAdmin($email){
    $query = $this->db->select('*');
    $query = $this->db->from('administrador');
    $query = $this->db->where("correo",$email);
    $query = $this->db->get();
    if($query->num_rows() > 0){
        foreach ($query->result() as $key){
            $data[]=$key;
        }
        return $data;
    }else{
        return FALSE;
    }
  }
  
}

