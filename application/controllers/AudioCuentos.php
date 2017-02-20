<?php

/*
 * 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AudioCuentos
 *
 * @author ORLANDO ALEXIS
 */

class Audios{
    public $audios = array();
}

class AudioCuentos extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('AudioCuentosModel');
        $this->load->library('form_validation');
    }
    
    public function index(){
        $result2 = $this->AudioCuentosModel->getGrados();
        $data['grados'] = $result2;
        $data['login'] = false;
        $data['inicio'] = '';
        $data['secuenciasdidacticas'] = '';
        $data['educacionyderechos'] = '';
        $data['promoradio'] = '';
        $data['audiocuentos'] = 'active';
        $data['canciones'] = '';
        $data['videos'] = '';
        $data['libros'] = '';
        $data['nosotros'] = '';
        $data['contacto'] = '';
        if($this->session->userdata('logueado')){
            $data['login'] = $this->session->userdata('logueado');
            $data['id'] = $this->session->userdata('id');
            $data['user'] = $this->session->userdata('nombre');
            $data['email'] = $this->session->userdata('email');
            if($this->session->userdata('gradoestudios') != null){
                $data['gradoEstudios'] = $this->session->userdata('gradoestudios');
            }else{
                $data['gradoEstudios'] = "No Especificado";
            }
            $e = $this->session->userdata('estudiante');
            $m = $this->session->userdata('maestro');
            $p = $this->session->userdata('padre');
            $data['tipo'] = $this->session->userdata('tipoCta');
            if($e == 1){
                $data['ocupacion'] = "Estudiante";
            }else if($m == 1){
                $data['ocupacion'] = "Maestro";
            }else if($p == 1){
                $data['ocupacion'] = "Padre de Familia";
            }else{
                $data['ocupacion'] = "No Especificada";
            }
            
            $this->load->view("AudioCuentos/AudioCuentosGrado",$data);
        }else{
            $this->load->view("AudioCuentos/AudioCuentosGrado",$data);
        }
        
    }
    
    public function cuentos(){
        $id = $this->input->get('id');
        if($id == 0){
            redirect('audiocuentosGrado','refresh');
                
        }else{
            $data['inicio'] = '';
            $data['secuenciasdidacticas'] = '';
            $data['educacionyderechos'] = '';
            $data['promoradio'] = '';
            $data['audiocuentos'] = 'active';
            $data['canciones'] = '';
            $data['videos'] = '';
            $data['libros'] = '';
            $data['nosotros'] = '';
            $data['contacto'] = '';
            $cuento = $this->AudioCuentosModel->getCuento($id);
            foreach ($cuento as $audio) {
                $data['idcuento']=$audio->id;
                $data['title']=$audio->titulo; 
                $data['src']=$audio->Archivo;                                                 
            }
            $result2 = $this->AudioCuentosModel->getGrados();
            $data['grados'] = $result2;
            $data['login'] = false;
            if($this->session->userdata('logueado')){
                $data['login'] = $this->session->userdata('logueado');
                $data['id'] = $this->session->userdata('id');
                $data['user'] = $this->session->userdata('nombre');
                $data['email'] = $this->session->userdata('email');
                if($this->session->userdata('gradoestudios') != null){
                    $data['gradoEstudios'] = $this->session->userdata('gradoestudios');
                }else{
                    $data['gradoEstudios'] = "No Especificado";
                }
                $e = $this->session->userdata('estudiante');
                $m = $this->session->userdata('maestro');
                $p = $this->session->userdata('padre');
                $data['tipo'] = $this->session->userdata('tipoCta');
                if($e == 1){
                    $data['ocupacion'] = "Estudiante";
                }else if($m == 1){
                    $data['ocupacion'] = "Maestro";
                }else if($p == 1){
                    $data['ocupacion'] = "Padre de Familia";
                }else{
                    $data['ocupacion'] = "No Especificada";
                }
                
                $this->load->view("AudioCuentos/AudioCuentosGrado",$data);
            }else{
                $this->load->view("AudioCuentos/AudioCuentosGrado",$data);
            }
        }
    }

    public function admin(){
        if($this->session->userdata('permitido') && $this->session->userdata('AC') == 1){
            $result = $this->AudioCuentosModel->getGrados();
            $data['grados'] = $result;
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
            $this->load->view("AudioCuentos/adminAudio",$data);
        }else{
            redirect('Panel','refresh');
        }
    }
    
    public function editar(){
        if($this->session->userdata('permitido') && $this->session->userdata('AC') == 1){
            $id = $this->input->get('id');
            $cuentos = $this->AudioCuentosModel->getCuento($id);
            foreach ($cuentos as $ctn) {
                $data['titulo'] = $ctn->titulo;
                $grado = $ctn->gradoEscolar;
            }
            $gradoSecuencia = $this->AudioCuentosModel->getGradosId($grado);
            $data['id'] = $id;
            $data['grade'] = $gradoSecuencia;
            $result = $this->AudioCuentosModel->getGrados();
            $data['grados'] = $result;
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
            $this->load->view("AudioCuentos/adminAudioEdita",$data);
        }else{
            redirect('Panel','refresh');
        }
    }

    public function edit(){
        if($this->session->userdata('permitido') && $this->session->userdata('AC') == 1){
            $id = $this->input->post('id');
            $titulo = $this->input->post('titulo');
            $grados = $this->input->post('gradoEscolar');
            $flag = "1";
            $cuentos = $this->AudioCuentosModel->getCuento($id);
            foreach ($cuentos as $ctn) {
                $data['titulo'] = $ctn->titulo;
                $grado = $ctn->gradoEscolar;
                $audio = $ctn->Archivo;
            }
            $config['upload_path'] = 'AudioCuentos';
            $config['allowed_types'] = "*";
            $config['max_size'] = "1024000000";
            $this->load->library('upload',$config);
            if($_FILES['file']['size'] > 0){
                if ($_FILES['file']['type'] == 'audio/mp3') {
                    
                    if ($this->upload->do_upload('file')){
                        $audioNew = 'AudioCuentos/'.$this->upload->data('file_name');
                        if(file_exists($audio)){
                            unlink($audio);
                        }
                        $audio = $audioNew;
                    }else{
                        $flag = "2";
                    }
                }else{
                    $flag = "0";
                }
            }
            if($flag == "1"){
                $this->AudioCuentosModel->editar($titulo,$grados,$id,$audio);
                $data['flag'] = "1";
            }else{
                $data['flag'] = $flag;
            }

            $cuentos = $this->AudioCuentosModel->getCuento($id);
            foreach ($cuentos as $ctn) {
                $data['titulo'] = $ctn->titulo;
                $grado = $ctn->gradoEscolar;
            }
            $gradoSecuencia = $this->AudioCuentosModel->getGradosId($grado);
            $data['id'] = $id;
            $data['grade'] = $gradoSecuencia;
            $result = $this->AudioCuentosModel->getGrados();
            $data['grados'] = $result;
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
            $this->load->view("AudioCuentos/adminAudioEdita",$data);
        }else{
            redirect('Panel','refresh');
        }
    }
    public function uploadAudio(){
        if($this->session->userdata('permitido') && $this->session->userdata('AC') == 1){
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
            $result = $this->AudioCuentosModel->getGrados();
            $data['grados'] = $result;
            if($_FILES["file"] != null){
                if($_FILES["file"]["type"]=="audio/mp3"){
                    $mi_archivo = 'file';
                    $config['upload_path'] = "AudioCuentos/";
                    $config['file_name'] = $_FILES["file"]["name"];
                    $config['allowed_types'] = "*";
                    $config['max_size'] = "1024000000";
                    $this->load->library('upload', $config);
                    if (!is_dir("AudioCuentos")){
                        @mkdir("AudioCuentos/",0755);
                    }
                    if (!$this->upload->do_upload('file')) {
                        //*** ocurrio un error
                        $data['flag'] = "2";
                        $this->load->view("AudioCuentos/adminAudio",$data);
                    }
                    $name = $this->upload->data('file_name');
                    //rename("AudioCuentos/".$name, "AudioCuentos/".$_FILES["file"]["name"]);
                    $titulo = $this->input->post('titulo');
                    $grado = $this->input->post('gradoEscolar');
                    $archivo = "AudioCuentos/".$name;
                    $fecha = date("Y-m-d");
                    $this->AudioCuentosModel->uploadAudio($archivo,$titulo,$grado,$fecha);
                    //$this->load->view("AudioCuentos/adminAudio");

                    $data['flag'] = "1";
                }
                else{

                    $data['flag'] = "0";
                }

                $this->load->view("AudioCuentos/adminAudio",$data);
            }
        }else{
            redirect('Panel','refresh');
        }
    }
    
    public function getAudioById(){
        $id = $this->input->post('id');
        $result = $this->AudioCuentosModel->getAudioCuentos($id);
        $audios = new Audios();
        if($result != FALSE){
            $flag = "true";
            foreach ($result as $audio) {
                array_push($audios->audios,$flag,$audio->Archivo,$audio->titulo,$audio->id);
            }

            echo json_encode($audios);
        }
        else{
            $flag= "false";
            array_push($audios->audios,$flag);
            echo json_encode($audios);
        }
        
    }
    
    public function deleteAudio(){
        if($this->session->userdata('permitido') && $this->session->userdata('AC') == 1){
            if($this->session->userdata('tipo') == "Recursos"){
                $result = $this->AudioCuentosModel->getAudioCuentosByAdmin($this->session->userdata('id'));
            }else{
                $result = $this->AudioCuentosModel->getAudioCuentosByAdminGral();
            }
            $data['audios'] = $result;
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
            $this->load->view("AudioCuentos/deleteAudios",$data);
        }else{
            redirect('Panel','refresh');
        }
    }
    
    public function deleteAudioById(){
        
        if($this->session->userdata('permitido') && $this->session->userdata('AC') == 1){
            $id = $this->input->post('id');
            $route = $this->input->post('route');
            if($id != null){
                if(file_exists($route)){
                    if(unlink($route)){
                        $result = $this->AudioCuentosModel->deleteAudio($id,$this->session->userdata('id'));
                    }

                }
                else{
                    $result = $this->AudioCuentosModel->deleteAudio($id,$this->session->userdata('id'));
                }
                $result1 = $this->AudioCuentosModel->getAudioCuentosNew($this->session->userdata('id'));
                $audios = new Audios();
                if($result1 != FALSE){
                    $flag = "true";

                    foreach ($result1 as $audio) {
                        array_push($audios->audios,$flag,$audio->id,$audio->titulo,$audio->nombre,$audio->Archivo,$audio->fecha);
                    }
                    echo json_encode($audios);
                }
                else{
                    $flag= "false";
                    array_push($audios->audios,$flag);
                    echo json_encode($audios);
                }
            } 
        }else{
            redirect('Panel','refresh');
        }

    }



    //put your code here
}
