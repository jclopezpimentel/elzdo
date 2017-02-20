<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Description of educacionyderechos
 *
 * @author Luis Salgado
 */

class Admin{
    public $administradores = array();
}
class Administrador extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('adminModel');
        $this->load->library('session');
        $this->load->model('usuariosModel');
    }
    
    public function index()
    {
        if($this->session->userdata('permitido')){//investigar "seccion->userdata('permitido')"
           if($this->session->userdata('tipo')  == "Recursos"){
               redirect('adminPanel','refresh');
           }else{
               redirect('adminGral','refresh');
           }
        }else{
            $data['flag'] = null;
            $this->load->view('admin/administrador',$data);
        }
    }

    public function login(){
        if($this->session->userdata('logueado')){
            $usuario_admin = array(
                        'logueado' => FALSE
                     );
            $this->session->set_userdata($usuario_admin);
        }
        
       $email = $this->input->post('email');
       $password = $this->input->post('password');
       $log = $this->adminModel->login($email,$password);
       if($log->num_rows() > 0){
           foreach ($log->result() as $fila) {
               $admin_data = array(
                   'permitido'=> TRUE,
                   'id' => $fila->id,
                   'nombre' => $fila->nombre,
                   'correo' => $fila->correo,
                   'foto' => $fila->foto,
                   'tipo' => $fila->tipo,
                   'descripcion' => $fila->descripcion,
                    'SD' => $fila->SD,
                    'ED' => $fila->ED,
                    'PR' => $fila->PR,
                    'AC' => $fila->AC,
                    'VD' => $fila->VD,
                    'CN' => $fila->CN,
                    'LB' => $fila->LB,
               );
               $this->session->set_userdata($admin_data);
               $fecha = date('Y-m-d H:i:s');
               $this->usuariosModel->log_registro("Login",$this->session->userdata('nombre'),$fecha);
           }
           
           if($this->session->userdata('tipo')  == "Recursos"){
               redirect('adminPanel','refresh');
           }else{
               redirect('adminGral','refresh');
           }
           
       }else{
           $data['flag'] = "0";
           $this->load->view('admin/administrador',$data);
       }
    }
    
    public function logout() {
        if($this->session->userdata('permitido')){
            $fecha = date('Y-m-d H:i:s');
            $this->usuariosModel->log_registro("Logout",$this->session->userdata('nombre'),$fecha);
            $this->session->sess_destroy();
        }
        redirect('Panel','refresh');
    }
    public function crearAdmin(){
        if($this->session->userdata('permitido') && $this->session->userdata('tipo') == "General"){
            $data['nombre'] = $this->session->userdata('nombre');
            $data['foto'] = $this->session->userdata('foto');
            $data['SD'] = $this->session->userdata('SD');
            $data['ED'] = $this->session->userdata('ED');
            $data['PR'] = $this->session->userdata('PR');
            $data['AC'] = $this->session->userdata('AC');
            $data['VD'] = $this->session->userdata('VD');
            $data['CN'] = $this->session->userdata('CN');
            $data['LB'] = $this->session->userdata('LB');
            $data['tipo'] = $this->session->userdata('tipo');
            $data['flag'] = null;
            $this->load->view('admin/crearAdmin',$data);
        }else{
            redirect('Panel','refresh');
        }
    }
    
    public function registrar(){
        if($this->session->userdata('permitido') && $this->session->userdata('tipo') == "General"){
            $correo = $this->input->post('correo');
            $data['nombre'] = $this->session->userdata('nombre');
            $data['foto'] = $this->session->userdata('foto');
            $data['SD'] = $this->session->userdata('SD');
            $data['ED'] = $this->session->userdata('ED');
            $data['PR'] = $this->session->userdata('PR');
            $data['AC'] = $this->session->userdata('AC');
            $data['VD'] = $this->session->userdata('VD');
            $data['CN'] = $this->session->userdata('CN');
            $data['LB'] = $this->session->userdata('LB');
            $data['tipo'] = $this->session->userdata('tipo');
            if($this->adminModel->verificarEmail($correo) == 0){
                if($_FILES['foto']['type'] == 'image/jpeg' || $_FILES['foto']['type'] == 'image/jpg' || $_FILES['foto']['type'] == 'image/png'){
                    //        $config['upload_path'] = "Admins/";
                $config['file_name'] = $_FILES["foto"]["name"];
                $config['allowed_types'] = "*";
                $config['max_size'] = "1024000000";

                $sd= 0;
                $ed= 0;
                $cn= 0;
                $lb= 0;
                $ac= 0;
                $pr= 0;
                $vd= 0;

                $nombre = $this->input->post('name');
                @mkdir("Admins",0755);
                @mkdir("Admins/".$nombre,0755);
                $config['upload_path'] = "Admins/".$nombre;
                $this->load->library('upload', $config);

                $contasena = $this->input->post('contrasena');
                $tipo = $this->input->post('tipo');
                $descripcion =$this->input->post('descripcion');

                if($nombre != null && $correo != null && $contasena != null && $tipo != null && $_FILES["foto"] != null){
                    $vsd =$this->input->post('sd');
                    if(isset($vsd)){
                        $sd = 1;
                    }
                    $ved =$this->input->post('ed');
                    if(isset($ved)){
                        $ed= 1;
                    }
                    $vcn = $this->input->post('cn');
                    if(isset($vcn)){
                        $cn=1;
                    }
                    $vlb = $this->input->post('lb');
                    if(isset($vlb)){
                        $lb =1;
                    }
                    $vac = $this->input->post('ac');
                    if(isset($vac)){
                        $ac=1;
                    }
                    $vpr = $this->input->post('pr');
                    if(isset($vpr)){
                        $pr =1;
                    }
                    $vvd = $this->input->post('vd');
                    if(isset($vvd)){
                        $vd= 1;
                    }
                    if (!$this->upload->do_upload('foto')) {
                        //*** ocurrio un error
                        $data['flag'] = "2";
                        $this->load->view('admin/crearAdmin',$data);
                    }
                    $name =$this->upload->data('file_name');
                    if($this->adminModel->setAdmin($nombre,$correo,$contasena,$tipo,$name,$descripcion,$sd,$ed,$cn,$lb,$ac,$pr,$vd)){
                        $data['flag'] = "1";
                    }
                    else{
                        $data['flag'] = "0";
                    }
                    //$this->load->view('admin/crearAdmin',$data);
                }
            }
            else{
                $data['flag'] = "3";
            }
        }else{
            $data['flag'] = "4";
        }
        $this->load->view('admin/crearAdmin',$data);
        }else{
            redirect('Panel','refresh');
        }
        
    }

    
    public function deleteAdm(){
        if($this->session->userdata('permitido') && $this->session->userdata('tipo') == "General"){
            $id = $this->session->userdata('id');
            $result = $this->adminModel->getAdmins($id);
            $data['admins'] = $result;
            $data['flag'] = "0";
            $data['nombre'] = $this->session->userdata('nombre');
            $data['foto'] = $this->session->userdata('foto');
            $data['SD'] = $this->session->userdata('SD');
            $data['ED'] = $this->session->userdata('ED');
            $data['PR'] = $this->session->userdata('PR');
            $data['AC'] = $this->session->userdata('AC');
            $data['VD'] = $this->session->userdata('VD');
            $data['CN'] = $this->session->userdata('CN');
            $data['LB'] = $this->session->userdata('LB');
            $data['tipo'] = $this->session->userdata('tipo');
            $this->load->view('admin/deleteAdmin',$data);
        }else{
            redirect('Panel','Refresh');
        }
    }
    
    public function getInfo(){
        if($this->session->userdata('permitido') && $this->session->userdata('tipo') == "General"){
            $id = $this->input->post('id');
            $result = $this->adminModel->getInfoById($id);
            $admins = new Admin();

            if($result != FALSE){
                foreach ($result as $adm ) {
                    array_push($admins->administradores, $adm->id,$adm->nombre,$adm->correo,$adm->descripcion);
                }
                echo json_encode($admins);
            }
        }else{
            redirect('Panel','refresh');
        }
        
    }
    public function deleteAdmById(){
        if($this->session->userdata('permitido') && $this->session->userdata('tipo') == "General"){
            $id = $this->input->post('admins');
            $nombre =  $this->input->post('nombre');
            if($nombre != null){
                $result = $this->adminModel->deleteAdmById($id);
                if($result){
                    $data['flag'] ="1";
                    //unlink("Admins/".$nombre."/".$foto);
                    $this->eliminarDir("Admins/".$nombre);
                }
                else{
                    $data['flag'] ="0";
                }
                
                
            }
            else{
                $data['flag'] ="0";
            }
            $result1 = $this->adminModel->getAdmins($this->session->userdata('id'));
            $data['admins'] = $result1;
            $data['nombre'] = $this->session->userdata('nombre');
            $data['foto'] = $this->session->userdata('foto');
            $data['SD'] = $this->session->userdata('SD');
            $data['ED'] = $this->session->userdata('ED');
            $data['PR'] = $this->session->userdata('PR');
            $data['AC'] = $this->session->userdata('AC');
            $data['VD'] = $this->session->userdata('VD');
            $data['CN'] = $this->session->userdata('CN');
            $data['LB'] = $this->session->userdata('LB');
            $data['tipo'] = $this->session->userdata('tipo');
            $this->load->view('admin/deleteAdmin',$data);
        }else{
            redirect('Panel', 'refresh');
        }

    }

    function eliminarDir($carpeta)
    {
        foreach(glob($carpeta . "/*") as $archivos_carpeta)
        {
            
            if (is_dir($archivos_carpeta))
            {
                $this->removeDirectory($archivos_carpeta);
            }
            else
            {
                unlink($archivos_carpeta);
            }
        }

        rmdir($carpeta);
    }
    function removeDirectory($path)
    {
        $path = rtrim( strval( $path ), '/' ) ;

        $d = dir( $path );

        if( ! $d )
            return false;

        while ( false !== ($current = $d->read()) )
        {
            if( $current === '.' || $current === '..')
                continue;

            $file = $d->path . '/' . $current;

            if( is_dir($file) )
                removeDirectory($file);

            if( is_file($file) )
                unlink($file);
        }

        rmdir( $d->path );
        $d->close();
        return true;
    }
    
    public function historial() {
        if($this->session->userdata('logueado')){
            $disco = $this->input->post('disco');
            $seccion = $this->input->post('seccion');
            $id = $this->input->post('id');
            $idadm = $this->input->post('idadm');
            $fecha = date('Y-m-d');
            if($disco != null && $seccion != null && $id != null){
                $v = $this->adminModel->Historial($disco,$seccion,$id,$fecha,$idadm);
            }
        }else{
            redirect('/', 'refresh');
        }
    }

    public function reset(){
        $this->load->view('admin/reset');
    }

    public function restaurar(){
        $iduser= $this->input->get('idusuario');
        $token = $this->input->get('token');
        $this->usuariosModel->updateReset($token);
        $sql = $this->usuariosModel->verificarToken($token);
        if($sql > 0){
            $usuario = $this->usuariosModel->verificarTokenReset($token);
            foreach ($usuario as $user) {
                    $id = $user->id;
                    $nombre = $user->username;
                    $idusuario = $user->idusuario;
                    $tk = $user->token;
                    $creado = $user->creado;
                }
            if(sha1($idusuario) == $iduser){
                $data['token'] = $token;
                $data['idusuario'] = $iduser;
                $this->load->view('admin/restaurar',$data);
            }else{
                redirect('/','refresh');    
            }
        }else{
            redirect('/','refresh');   
        }
        
    }

    public function cambiarpasswordadmin(){
        $data['flag'] = "La contraseña se actualizó con exito.";
        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');
        $idusuario2 = $this->input->post('idusuario');
        $token = $this->input->post('token');
        $this->usuariosModel->updateReset($token);
        if( $password1 != "" && $password2 != "" && $idusuario2 != "" && $token != "" ){
            $sql = $this->usuariosModel->verificarToken($token);
            if($sql > 0){
                $usuario = $this->usuariosModel->verificarTokenReset($token);
                foreach ($usuario as $user) {
                        $id = $user->id;
                        $nombre = $user->username;
                        $idusuario = $user->idusuario;
                        $tk = $user->token;
                        $creado = $user->creado;
                    }
                if(sha1($idusuario) == $idusuario2){
                    if($password1 == $password2){
                           if($this->usuariosModel->updateInfoPassResetAdmin($idusuario,$password1)){
                                $this->usuariosModel->deleteResetToken($token);
                                $this->usuariosModel->deleteReset($token);
                           }else{
                                $data['flag'] = "Ocurrió un error al actualizar la contraseña, intentalo más tarde";
                           }
                    }else{
                        $data['flag'] = "Las contraseñas no coinciden";
                    }
                }else{
                    $data['flag'] = "El token no es válido";   
                } 
            }else{
                $data['flag'] = "El token no es válido";
            }
            $this->load->view('admin/passwordadmin',$data);
        }else{
            redirect('/','refresh');   
        }
    }


}