<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Valores{
    public $valor = array();
}
class Direcciones{
    public $URL = array();
}
class Videos extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('AdmivideosModel');
    }
    
    public function index()
    {
        $categoria = $this->AdmivideosModel->getcategoria();
        $data['videosUrl'] = $this->AdmivideosModel->listVideosMiniatura();
        $data['categoria'] = $categoria;
        $data['login'] = false;
        $data['inicio'] = '';
        $data['secuenciasdidacticas'] = '';
        $data['educacionyderechos'] = '';
        $data['promoradio'] = '';
        $data['audiocuentos'] = '';
        $data['canciones'] = '';
        $data['videos'] = 'active';
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
            $this->load->view('videos/videos',$data);
        
        }else{
            $this->load->view('videos/videos',$data);
        }
    }
    public function valosearch(){
        $categoria = $this->input->post('categoria');
        $result = $this->AdmivideosModel->valorcondition($categoria);
        $val = new Valores();
        if($result != FALSE){
            foreach ($result as $key) {
                array_push($val->valor,"true",$key->idValores,$key->nombre);
            }
            echo json_encode($val);
        }
        else{
            array_push($val->valor,"false");
            echo json_encode($val);
        }
        
        //echo "<option value='".$row['idValores']."'>".$row['idValores']."</option>";
    }

    public function urlsearch(){
        $valore = $this->input->post('valores');
        $categoria = $this->input->post('cate');
        $result = $this->AdmivideosModel->urlcondition($valore, $categoria);
        $urls = new Direcciones();
        if($result != FALSE){
            $flag='true';
            foreach ($result as $key) {
                array_push($urls->URL,$flag,$key->url,$key->titulo,$key->id);
            }
            echo json_encode($urls);      
        }
        else{
            $flag=false;
            foreach ($result as $key) {
                array_push($urls->URL,$flag);
            }
            echo json_encode($urls);    
        }
    }
    
    
    
}