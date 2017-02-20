<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nosotros
 *
 * @author ORLANDO ALEXIS
 */
class Nosotros extends CI_Controller{
    public function __construct() {
        parent::__construct();
    }
    
    public function index(){
    	$data['login'] = false;
        $data['inicio'] = '';
        $data['secuenciasdidacticas'] = '';
        $data['educacionyderechos'] = '';
        $data['promoradio'] = '';
        $data['audiocuentos'] = '';
        $data['canciones'] = '';
        $data['videos'] = '';
        $data['libros'] = '';
        $data['nosotros'] = 'active';
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
                $data['ocupacion'] = "No especificada";
            }
        	$this->load->view("Nosotros/nosotros",$data);
    	}else{
    		$this->load->view("Nosotros/nosotros",$data);
    	}
    }
    //put your code here
}
