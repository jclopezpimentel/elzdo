<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Podcast{
    public $Podcast1=array();
}
class PromoRadio extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('PromoRadioModel');
    }
    
    public function index(){
        $result = $this->PromoRadioModel->listPodcast();
            $data['lista'] = $result;
            $data['login'] = false;
        $data['inicio'] = '';
        $data['secuenciasdidacticas'] = '';
        $data['educacionyderechos'] = '';
        $data['promoradio'] = 'active';
        $data['audiocuentos'] = '';
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
            
            $this->load->view('PromoRadio/promoRadio',$data);
            
        }  else {
            $this->load->view('PromoRadio/promoRadio',$data);
        }
    }
    public function podcast(){
        $id = $this->input->get('id');
        if($id == 0){
                redirect('promoRadio','refresh');
                
        }else{
            $data['inicio'] = '';
            $data['secuenciasdidacticas'] = '';
            $data['educacionyderechos'] = '';
            $data['promoradio'] = 'active';
            $data['audiocuentos'] = '';
            $data['canciones'] = '';
            $data['videos'] = '';
            $data['libros'] = '';
            $data['nosotros'] = '';
            $data['contacto'] = '';
            $podcaster = $this->PromoRadioModel->BDidPodcast($id);
                foreach ($podcaster as $pod) {
                    $data['titulo']=$pod->titulo; 
                    $data['descripcion']=$pod->descripcion;
                    $data['url']=$pod->podcast;
                    $data['idp']=$pod->id;                                                 
                }


                $result = $this->PromoRadioModel->listPodcast();
                    $data['lista'] = $result;
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
                    
                    $this->load->view('PromoRadio/promoRadio',$data);
                    
                }  else {
                    $this->load->view('PromoRadio/promoRadio',$data);
                }
            }
    }
    public function AddPodcats(){
        if($this->session->userdata('permitido') && $this->session->userdata('PR') == 1){
            $data['flag'] = "0";
            if($_FILES['podcast'] != null ){
                if ($_FILES['podcast']['type'] == 'audio/mp3') {

                    $titulo = $this->input->post('titulo');
                    $fecha = date('y-m-d');
                    $descripcion = $this->input->post('descripcion');
                    $administrador = $this->session->userdata('id');
                    $rutadelservidor = 'Podcast';
                    if (!is_dir($rutadelservidor)){
                                @mkdir($rutadelservidor,0755);
                    }
        //            $nombredelpodcats = str_replace(" ", "_", $_FILES['podcast']['name']);
        //            $rutadestino = $rutadelservidor."/".$nombredelpodcats;
                    $config['upload_path']=$rutadelservidor;
                    $config['allowed_types']="mp3";
                    $config['max_size']="1073741274";
                    $this->load->library('upload',$config);
                    if($this->upload->do_upload('podcast')){
                        $nombredelpodcats = $this->upload->data('file_name');
                        $rutadestino = $rutadelservidor."/".$nombredelpodcats;
                        if(file_exists($rutadestino)){
                            $resultado = $this->PromoRadioModel->AddpodcastBD($rutadestino,$titulo,$descripcion,$administrador,$fecha);
                            $data['flag'] = "1";
                        }
                    }
                    else{
                        $data['flag'] = "2";
                    }
                }
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
                $this->load->view('PromoRadio/AdmipromoRadio',$data);
            }
        }else{
            redirect('Panel', 'refresh');
        }
    }
    
    public function idpodcast(){
        $id = $this->input->post('id');
        if($id != null){
            $resul = $this->PromoRadioModel->BDidPodcast($id);
            $idpodcast = new Podcast();
            foreach ($resul as $key) {
                array_push($idpodcast->Podcast1, $key->podcast,$key->titulo,nl2br($key->descripcion));
            }
            echo json_encode($idpodcast);

        }
    }
}
