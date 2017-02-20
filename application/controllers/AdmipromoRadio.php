<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Podcast{
    public $podcast = array();
}

class AdmipromoRadio extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('PromoRadioModel');
    }
    public function index(){
        
        if($this->session->userdata('permitido') && $this->session->userdata('PR') == 1){
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
            $this->load->view('PromoRadio/AdmipromoRadio',$data);

        }else{
            redirect('Panel', 'refresh');
        }
    }
    public function editar(){
        
        if($this->session->userdata('permitido') && $this->session->userdata('PR') == 1){
            $id = $this->input->get('id');
            $pd = $this->PromoRadioModel->BDidPodcast($id);
            foreach ($pd as $podcast) {
                $data['titulo'] = $podcast->titulo;
                $data['descripcion'] = $podcast->descripcion;
                $data['id'] = $podcast->id;
            }
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
            $this->load->view('PromoRadio/AdmipromoRadioEdita',$data);

        }else{
            redirect('Panel', 'refresh');
        }
    }
    public function edit(){
        
        if($this->session->userdata('permitido') && $this->session->userdata('PR') == 1){
            $id = $this->input->post('id');
            $titulo = $this->input->post('titulo');
            $descripcion = $this->input->post('descripcion');
            $flag = "1";
            $pd = $this->PromoRadioModel->BDidPodcast($id);
            foreach ($pd as $podcast) {
                $data['titulo'] = $podcast->titulo;
                $data['descripcion'] = $podcast->descripcion;
                $data['id'] = $podcast->id;
                $radio = $podcast->podcast; 
            }
            $config['upload_path'] = 'Podcast';
            $config['allowed_types'] = "*";
            $config['max_size'] = "1024000000";
            $this->load->library('upload',$config);
            if($_FILES['podcast']['size'] > 0){
                if ($_FILES['podcast']['type'] == 'audio/mp3') {
                    if ($this->upload->do_upload('podcast')){
                        $radioNew = 'Podcast/'.$this->upload->data('file_name');
                        if(file_exists($radio)){
                            unlink($radio);
                        }
                        $radio = $radioNew;
                    }else{
                        $flag = "2";
                    }
                }else{
                    $flag = "0";
                }
            }
            if($flag == "1"){
                $this->PromoRadioModel->editar($titulo,$descripcion,$id,$radio);
                $data['flag'] = "1";
            }else{
                $data['flag'] = $flag;
            }

            
            $pd = $this->PromoRadioModel->BDidPodcast($id);
            foreach ($pd as $podcast) {
                $data['titulo'] = $podcast->titulo;
                $data['descripcion'] = $podcast->descripcion;
                $data['id'] = $podcast->id;
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
            $this->load->view('PromoRadio/AdmipromoRadioEdita',$data);

        }else{
            redirect('Panel', 'refresh');
        }
    }
    public function deletepodcastlist() {
        if($this->session->userdata('permitido') && $this->session->userdata('PR') == 1){
            $admin =$this->session->userdata('id');
            $id = $this->input->post('id');
            $route = $this->input->post('route');
            if($id != null && $route != null){
                if(file_exists($route)){
                    if(unlink($route)){
                        $result = $this->PromoRadioModel->BDdelete($id);
                    }

                }
                else{
                    $result = $this->PromoRadioModel->BDdelete($id);
                }

                $result1 = $this->PromoRadioModel->getPodcastNew($admin);
                $podcasts = new Podcast();
                if($result1 != FALSE){
                    $flag = "true";

                    foreach ($result1 as $podcast) {
                        array_push($podcasts->podcast,$flag,$podcast->id,$podcast->titulo,$podcast->descripcion,$podcast->fechar,$podcast->podcast);
                    }
                    echo json_encode($podcasts);
                }
                else{
                    $flag= "false";
                    array_push($podcasts->podcast,$flag);
                    echo json_encode($podcasts);
                } 
            }
        }else{
            redirect('Panel', 'refresh');
        }
    }
    
    public function deletePodcast(){
        if($this->session->userdata('permitido') && $this->session->userdata('PR') == 1){
            $admin =$this->session->userdata('id');
            if($this->session->userdata('tipo') == "Recursos"){
                $result1 = $this->PromoRadioModel->BDtablepodcast($admin);
            }else{
                $result1 = $this->PromoRadioModel->BDtablepodcastGral();
            }
            $data['tabla'] = $result1;
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
            $this->load->view('PromoRadio/deletePodcast',$data);

        }else{
            redirect('Panel', 'refresh');
        }
    }
}