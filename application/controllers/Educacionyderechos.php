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
class educacionyderechos extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('educacionyderechoModel');
    }
    
    public function index()
    {
        $data['inicio'] = '';
        $data['secuenciasdidacticas'] = '';
        $data['educacionyderechos'] = 'active';
        $data['promoradio'] = '';
        $data['audiocuentos'] = '';
        $data['canciones'] = '';
        $data['videos'] = '';
        $data['libros'] = '';
        $data['nosotros'] = '';
        $data['contacto'] = '';
        $result = $this->educacionyderechoModel->generarforo2();
        $data['data'] = $result;
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
            
            $this->load->view('educacionyderechos/educacionyderechos',$data);
        }else{
            $this->load->view('educacionyderechos/educacionyderechos',$data);
        }
    }
}
