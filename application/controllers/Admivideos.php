<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Videos{
    public $videos = array();
}
class Valores{
    public $valores = array();
}
class Categorias{
    public $categorias = array();
}

class Admivideos extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('AdmivideosModel');
    }
    
    public function index()
    {
        if($this->session->userdata('permitido') && $this->session->userdata('VD') == 1){
            $result= $this->AdmivideosModel->getcategoria();
            $result2 = $this->AdmivideosModel->getvalores();
            $result3 = $this->AdmivideosModel->listVideos();
            $data['tabla'] = $result3;
            $data['categoria']=$result;
            $data['valores']=$result2;
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
            $this->load->view('videos/Admivideos',$data);
        
        }else{
            redirect('Panel', 'refresh');
        }
    }
    

    public function editar()
    {
        if($this->session->userdata('permitido') && $this->session->userdata('VD') == 1){
            $id = $this->input->get('id');
            $video = $this->AdmivideosModel->getVideo($id);
            foreach ($video as $ctn) {
                $data['titulo'] = $ctn->titulo;
                $data['url'] = $ctn->url;
                $categoria = $ctn->idCategoria;
                $valor = $ctn->idValores;
            }
            $categorias = $this->AdmivideosModel->getcategoriaId($categoria);
            $valores = $this->AdmivideosModel->getvaloresId($valor);
            $data['ctg'] = $categorias;
            $data['vlr'] = $valores;
            $data['id'] = $id;
            $result= $this->AdmivideosModel->getcategoria();
            $result2 = $this->AdmivideosModel->getvalores();
            $result3 = $this->AdmivideosModel->listVideos();
            $data['tabla'] = $result3;
            $data['categoria']=$result;
            $data['valores']=$result2;
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
            $this->load->view('videos/AdmivideosEdita',$data);
        
        }else{
            redirect('Panel', 'refresh');
        }
    }


    public function edit()
    {
        if($this->session->userdata('permitido') && $this->session->userdata('VD') == 1){
            $id = $this->input->post('id');
            $titulo = $this->input->post('title');
            $url = $this->input->post('url');
            $ctg = $this->input->post('categoria');
            $vlr = $this->input->post('valores');
            $uri = str_replace("watch?v=", "embed/", $url);
            $this->AdmivideosModel->editar($titulo,$uri,$ctg,$vlr,$id);

            $video = $this->AdmivideosModel->getVideo($id);
            foreach ($video as $ctn) {
                $data['titulo'] = $ctn->titulo;
                $data['url'] = $ctn->url;
                $categoria = $ctn->idCategoria;
                $valor = $ctn->idValores;
            }
            $categorias = $this->AdmivideosModel->getcategoriaId($categoria);
            $valores = $this->AdmivideosModel->getvaloresId($valor);
            $data['ctg'] = $categorias;
            $data['vlr'] = $valores;
            $data['id'] = $id;
            $result= $this->AdmivideosModel->getcategoria();
            $result2 = $this->AdmivideosModel->getvalores();
            $result3 = $this->AdmivideosModel->listVideos();
            $data['tabla'] = $result3;
            $data['categoria']=$result;
            $data['valores']=$result2;
            $data['flag'] = 1;
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
            $this->load->view('videos/AdmivideosEdita',$data);
        
        }else{
            redirect('Panel', 'refresh');
        }
    }








    public function loadAdvideo(){
        if($this->session->userdata('permitido') && $this->session->userdata('VD') == 1){
            $data['flag']="0";
            $categoria = $this->input->post('categoria');
            $valores = $this-> input->post('valores');
            $uri = $this->input->post('url');
            $url = str_replace("watch?v=", "embed/", $uri);
            $titulo = $this->input->post('title');
            $admi = $this->session->userdata('id');
            $fecha  = date('Y-m-d');
            if($categoria != null && $valores != null && $url != null && $titulo != null){
                $result = $this->AdmivideosModel->addvideo($titulo,$url,$categoria,$valores,$admi,$fecha);
                if($result){
                    $data['flag']="1";
                }
                $result= $this->AdmivideosModel->getcategoria();
                $result2 = $this->AdmivideosModel->getvalores();
                $result3 = $this->AdmivideosModel->listVideos();
                $data['tabla'] = $result3;
                $data['categoria']=$result;
                $data['valores']=$result2;
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
                $this->load->view('videos/Admivideos',$data);
            }
        }else{
            redirect('Panel', 'refresh');
        }
        
    }
    public function newCategoria(){
        if($this->session->userdata('permitido') && $this->session->userdata('VD') == 1){
            $categoria1 = $this->input->post('newname');
            if($categoria1 != null){
                if($this->AdmivideosModel->getcategoriaCont($categoria1) == 0){
                    $result = $this->AdmivideosModel->addCategoria($categoria1);
                    $result2 = $this->AdmivideosModel->getCategoriasNew();
                    $categorias = new Categorias();
                    if($result2 != FALSE){
                        foreach ($result2 as $categoria) {
                            array_push($categorias->categorias,$categoria->id,$categoria->categoria);
                        }
                        echo json_encode($categorias);
                    }
                }else{
                    $categorias = new Categorias();
                    echo json_encode($categorias);
                }
            }
        }else{
            redirect('Panel', 'refresh');
        }
    }

    public function newVideo(){
        if($this->session->userdata('permitido') && $this->session->userdata('VD') == 1){
            $valor1 = $this->input->post('newname');
            if($valor1 != null){
                if($this->AdmivideosModel->getvaloresCont($valor1) == 0){
                    $result = $this->AdmivideosModel->addValor($valor1);
                    $result2 = $this->AdmivideosModel->getvaloresNew();
                    $valores = new Valores();
                    if($result2 != FALSE){
                        foreach ($result2 as $valor) {
                            array_push($valores->valores,$valor->id,$valor->nombre);
                        }
                        echo json_encode($valores);
                    }
                }else{
                    $valores = new Valores();
                    echo json_encode($valores);
                }
            }
        }else{
            redirect('Panel', 'refresh');
        }        
    }
    
    public function deletevideo(){
        if($this->session->userdata('permitido') && $this->session->userdata('VD') == 1){
            $id=$this->input->post('id');
            if($id != null){
                $result = $this->AdmivideosModel->deleteVideo($id);
                $videos = new Videos();
                if($result != FALSE){
                    $flag = "true";
                    foreach ($result as $video) {
                        array_push($videos->videos,$flag,$video->id,$video->titulo,$video->fecha,$video->url);
                    }
                    echo json_encode($videos);
                }
                else{
                    $flag= "false";
                    array_push($videos->videos,$flag);
                    echo json_encode($videos);
                } 
            }
        }else{
            redirect('Panel', 'refresh');
        }
    }
    //revisar
    public function deleteVideos(){
        if($this->session->userdata('permitido') && $this->session->userdata('VD') == 1){
            if($this->session->userdata('tipo') == "Recursos"){
                $result3 = $this->AdmivideosModel->listVideosId($this->session->userdata('id'));
            }else{
                $result3 = $this->AdmivideosModel->listVideosGral();
            }
            $data['tabla'] = $result3;
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
            $this->load->view('videos/deleteVideos',$data);

        }else{
            redirect('Panel', 'refresh');
        }

    }
    
}