<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class datos{
    public $info = array(); 
}

class Historial extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('historialModel');
    }
    
    public function index()
    {
        if($this->session->userdata('permitido')){
            //$result= $this->AdmivideosModel->getcategoria();
            //$result2 = $this->AdmivideosModel->getvalores();
            //$result3 = $this->AdmivideosModel->listVideos();
            //$data['tabla'] = $result3;
            //$data['categoria']=$result;
            //$data['valores']=$result2;
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
            $this->load->view('historial/historial',$data);
        
        }else{
            redirect('Panel', 'refresh');
        }
    }
    
    
    public function getHistorial() {
        $seccion = $this->input->post('seccion');
        $tabla = 'disco';
        $campo = 'nombre';
        switch ($seccion) {
            case 'Secuencias didacticas':
                $tabla = 'secuenciasdidacticas';
                $campo = 'titulo';
                break;
            case 'Educacion y derecho':
                $tabla = 'educacionyderechos';
                $campo = 'titulo';
                break;
            case 'Promo Radio':
                $tabla = 'promoradio';
                $campo = 'titulo';
                break;
            case 'Audiocuentos':
                $tabla = 'audiocuentos';
                $campo = 'titulo';
                break;
            case 'Canciones':
                $tabla = 'disco';
                $campo = 'nombre';
                break;
            case 'Videos':
                $tabla = 'videos';
                $campo = 'titulo';
                break;
            case 'Libros':
                $tabla = 'libro';
                $campo = 'titulo';
                break;

        }
        $result = $this->historialModel->history($seccion,$tabla,$campo);
        $infoH = new datos();
        if($result != FALSE){
            foreach ($result as $dt) {
                array_push($infoH->info,$dt->nombre,$dt->seccion,$dt->recurso,$dt->fecha);
            }
            
        }
        echo json_encode($infoH);
    }
    
}
