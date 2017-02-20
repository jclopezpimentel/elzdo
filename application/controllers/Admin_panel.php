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
class Privilegios{
    public $privilegios = array();
}
class Admin{
    public $administrador = array();
}

class Admin_panel extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('adminModel');
        $this->load->model('usuariosModel');
        //$this->load->model('educacionyderechoModel');
    }
    
    public function index()
    {
        if($this->session->userdata('permitido') && $this->session->userdata('tipo') == "Recursos"){
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
            $this->load->view('admin/admin_panel',$data);
        
        }else{
            redirect('Panel','refresh');
        }
    }
    public function adminGral() {
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
            $this->load->view('admin/admin_panelGeneral',$data);
        
        }else{
            redirect('Panel','refresh');
        }
    }
    public function privilegios(){
        if($this->session->userdata('permitido') && $this->session->userdata('tipo') == "General"){
            $result = $this->adminModel->getAdministradores();
            $data['administradores'] = $result;
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
            $this->load->view('admin/privilegios',$data);
        }else{
            redirect('Panel','refresh');
        }
    }
    public function getPrivilegios(){
        if($this->session->userdata('permitido') && $this->session->userdata('tipo') == "General"){
            $id=$this->input->post("id");
            $result1 = $this->adminModel->getPrivilegios($id);
            $priv = new Privilegios();
            foreach ($result1 as $privi) {
                array_push($priv->privilegios,$privi->SD,$privi->ED,$privi->PR,$privi->AC,$privi->CN,$privi->VD,$privi->LB);
            }
            echo json_encode($priv);
        }else{
            redirect('Panel','refresh');
        }
    }
    
    public function updateP(){
        if($this->session->userdata('permitido') && $this->session->userdata('tipo') == "General"){
            $id= $this->input->post('admin');
            $sd= 0;
            $ed= 0;
            $cn= 0;
            $lb= 0;
            $ac= 0;
            $pr= 0;
            $vd= 0;
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
            $privilegios = array(
                'SD' => $sd,
                'ED' => $ed,
                'PR' => $pr,
                'AC' => $ac,
                'VD' => $vd,
                'CN' => $cn,
                'LB' => $lb
            );
                $result=  $this->adminModel->updatePrivilegios($id,$privilegios);
                $result1 = $this->adminModel->getAdministradores();
                $data['administradores'] = $result1;
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
                if ($result) {
                    $data['flag'] = "1";
                }
                else{
                    $data['flag'] = "0";
                }
                $this->load->view('admin/privilegios',$data);
        }else{
            redirect('Panel','refresh');
        }
    }
    public function adminInfo(){
       if($this->session->userdata('permitido') && $this->session->userdata('tipo') == "General"){
            $result1 = $this->adminModel->getAdministradores();
            $data['administradores'] = $result1;
            $data['flag'] = null;
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
           $this->load->view('admin/infoAdmin',$data);

       }
    }
    
    public function getInfoAdmin(){
        if($this->session->userdata('permitido') && $this->session->userdata('tipo') == "General"){
            $id=$this->input->post("id");
            $result1 = $this->adminModel->getInfo($id);
            $admin = new Admin();
            foreach ($result1 as $adm) {
                array_push($admin->administrador,$adm->nombre,$adm->correo,$adm->password,$adm->descripcion,$adm->foto);
            }
            echo json_encode($admin);

        }
    }
    
    public function updateInfo(){
        if($this->session->userdata('permitido') && $this->session->userdata('tipo') == "General"){
            $id= $this->input->post('admin');
            $nombre =$this->input->post("nombre");
            $foto=  $this->input->post("fotoAnt");
            $nombreAnt =$this->input->post("nombreAnt");
            $correo =$this->input->post("correo");
            $contrasena =$this->input->post("contrasena");
            //$contrasenaAnt =$this->input->post("passAnt");
            $descripcion =  $this->input->post("descripcion");
            if($id != null && $nombre !=null && $nombreAnt != null && $correo != null && $descripcion != null){
                if(trim($nombre) !== trim($nombreAnt)){

                    rename("Admins/".$nombreAnt, "Admins/".$nombre);
                    $nombreAnt = $nombre;

                }
                
                    
                
                if(!empty($_FILES['foto']['name'])){
                    if(unlink("Admins/".$nombreAnt."/".$foto)){
                        $config['upload_path'] = "Admins/".$nombreAnt;
                        $config['allowed_types'] = "*";
                        $config['file_name'] = $_FILES["foto"]["name"];
                        $config['max_size'] = "1024000000";
                        $this->load->library('upload', $config);
                        if (!$this->upload->do_upload('foto')) {
                            //*** ocurrio un error
                            $data['flag'] = "2";
                            //$this->load->view("AudioCuentos/adminAudio",$data);
                        }
                        $foto = $this->upload->data('file_name');
                    }  
                }
                
                if($contrasena != ""){
                
                    $data = array(
                        'nombre' => $nombre,
                        'correo' => $correo,
                        'password' => $contrasena,
                        'foto' => $foto,
                        'descripcion' => $descripcion
                    );
                }
                else{
                    $data = array(
                        'nombre' => $nombre,
                        'correo' => $correo,
                        'foto' => $foto,
                        'descripcion' => $descripcion
                    );
                }

                $result=  $this->adminModel->updateInfo($id,$data);
                if($result){
                    $fecha = date('Y-m-d H:i:s');
                $this->usuariosModel->log_registro("Change-Password",$this->session->userdata('nombre'),$fecha);
                    $data1['flag'] = "1";
                }
                $result1 = $this->adminModel->getAdministradores();
                $data1['administradores'] = $result1;
                $data1['nombre'] = $this->session->userdata('nombre');
                $data1['foto'] = $this->session->userdata('foto');
                $data1['SD'] = $this->session->userdata('SD');
                $data1['ED'] = $this->session->userdata('ED');
                $data1['PR'] = $this->session->userdata('PR');
                $data1['AC'] = $this->session->userdata('AC');
                $data1['VD'] = $this->session->userdata('VD');
                $data1['CN'] = $this->session->userdata('CN');
                $data1['LB'] = $this->session->userdata('LB');
                $data1['tipo'] = $this->session->userdata('tipo');
                $this->load->view('admin/infoAdmin',$data1);
            }
        }
    }
    
}