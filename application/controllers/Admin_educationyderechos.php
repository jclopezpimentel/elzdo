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
class Educaciones{
     public $educacion = array();
}

class Admin_educationyderechos extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('educacionyderechoModel');
    }
    
    public function index()
    {
        if($this->session->userdata('permitido') && $this->session->userdata('ED') == 1){
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
            $this->load->view('educacionyderechos/Admin_educationyderechos',$data);        
        }else{
            redirect('Panel','refresh');
        }
    }
    
    public function loadeyd(){
        if($this->session->userdata('permitido') && $this->session->userdata('ED') == 1){
            if($_FILES["imagen"] != null){
                if($_FILES["imagen"]["type"]=="image/jpeg" || $_FILES["imagen"]["type"]=="image/jpg" || $_FILES["imagen"]["type"]=="image/png"){
                    if($_FILES["pdf"]["type"]=="application/pdf"){


                        $title = $this->input->post('titulo');
                        //$pdf=$this->input->post('pdf');
                        $descripcion=$this->input->post('descripcion');
                        $fecha = date("y-m-d");
                        $adminis = $this->session->userdata('id');
                       // if ($_FILES['imagen']['type']=='image/jpg' || $_FILES['imagen']['type']=='image/jpeg' || $_FILES['imagen']['type']=='image/png'){

                        $rutaServidor = 'educacionyderecho';
                        $carpeta = $rutaServidor."/".$title;
                        if (!is_dir($rutaServidor)){
                            @mkdir($rutaServidor."/",0755);
                            
                        }
                        @mkdir($carpeta,0755);
                       // $rutaTemporal = $_FILES['imagen']['tmp_name'];
                        $nombreImagen = $_FILES['imagen']['name'];
                        $nombrePdf = $_FILES['pdf']['name'];
                        //$nombreImagen = $this->input->post('imagen');
                        //$nombrePdf = $this->input->post('pdf');
                        $imagen = $carpeta.'/'.$nombreImagen;
                        $pdfPath = $carpeta.'/'.$nombrePdf;

                        //move_uploaded_file($rutaTemporal,$rutaDestino);
                        $config['upload_path'] = $carpeta;
                        $config['allowed_types'] = "*";
                        $config['max_size'] = "1024000000";
                        $this->load->library('upload',$config);
                        $pdfPath != null;
                        $imagen !=null;
                        if(file_exists($imagen)){
                            $data['flag'] = "0";

                        }
                        if(file_exists($pdfPath)){
                            $data['flag'] = "1";

                        }
                        if($this->upload->do_upload('imagen')){
                            $imagen = $carpeta.'/'.$this->upload->data('file_name');
                        }else{
                            $data['flag'] = "2";
                        }

                        if($this->upload->do_upload('pdf')){
                            $pdfPath = $carpeta.'/'.$this->upload->data('file_name');
                        }else{
                            $data['flag'] = "3";
                        }
                        if($pdfPath != null && $imagen !=null){
                            $data['flag'] = "4";
                            $result = $this->educacionyderechoModel->insetarforo($imagen,$pdfPath,$title,$descripcion,$adminis,$fecha);
                        }

                    }
                    else{
                        $data['flag'] = "5";
                    }
                }
                else{
                    $data['flag'] = "6";
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
                $this->load->view('educacionyderechos/Admin_educationyderechos',$data);
            }
        }else{
            redirect('Panel', 'refresh');
        }
    }

    public function deleteEyD()
    {
        if($this->session->userdata('permitido') && $this->session->userdata('ED') == 1){
            $admin =$this->session->userdata('id');
            if($this->session->userdata('tipo') == "Recursos"){
                $result = $this->educacionyderechoModel->generarforo($admin);
            }else{
                $result = $this->educacionyderechoModel->generarforoGral();
            }
            $data['data'] = $result;
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
            $this->load->view('educacionyderechos/Admin_educationyderechos_eliminar',$data);
        
        }else{
            redirect('Panel', 'refresh');
        }
    }
    
    public function editar()
    {
        if($this->session->userdata('permitido') && $this->session->userdata('ED') == 1){
            $id =$this->input->get('id');
            $ed = $this->educacionyderechoModel->getEducacionId($id);
            foreach ($ed as $eyd) {
                $data['titulo'] = $eyd->titulo;
                $data['descripcion'] = $eyd->descripcion;
                $data['id'] = $eyd->id;
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
            $this->load->view('educacionyderechos/Admin_educationyderechosEdita',$data);  
        
        }else{
            redirect('Panel', 'refresh');
        }
    }
    public function edit()
    {
        if($this->session->userdata('permitido') && $this->session->userdata('ED') == 1){
            $id =$this->input->post('id');
            $titulo =$this->input->post('titulo');
            $descripcion =$this->input->post('descripcion');
            $flag = "1";
            $ed = $this->educacionyderechoModel->getEducacionId($id);
            foreach ($ed as $eyd) {
                $data['titulo'] = $eyd->titulo;
                $data['descripcion'] = $eyd->descripcion;
                $data['id'] = $eyd->id;
                $pdf = $eyd->pdfPath;
                $portada = $eyd->imagen;
            }
            $rutas = explode("/", $pdf);
            $config['upload_path'] = $rutas[0].'/'.$rutas[1];
            $config['allowed_types'] = "*";
            $config['max_size'] = "1024000000";
            $this->load->library('upload',$config);
            if($_FILES['imagen']['size'] > 0){
                if($_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png"){
                    if ($this->upload->do_upload('imagen')){
                        $portadaNew = $rutas[0].'/'.$rutas[1].'/'.$this->upload->data('file_name');
                        if(file_exists($portada)){
                            unlink($portada);
                        }
                        $portada = $portadaNew;
                    }else{
                        $flag = "3";
                    }
                }else{
                    $flag = "0";
                }
            }
            if($_FILES['pdf']['size'] > 0){
                if($_FILES['pdf']['type'] =="application/pdf" && $flag != "0"){
                    if($this->upload->do_upload('pdf')){
                        $pdfNew = $rutas[0].'/'.$rutas[1].'/'.$this->upload->data('file_name');
                        if(file_exists($pdf)){
                            unlink($pdf);
                        }
                        $pdf = $pdfNew;
                    }else{
                        $flag = "2";
                    }
                }else{
                    $flag = "0";
                }
            }
            if($flag == "1"){
                $this->educacionyderechoModel->editar($titulo,$descripcion,$id,$pdf,$portada);
                $data['flag'] = "1";
            }else{
                $data['flag'] = $flag;
            }

            
            $ed = $this->educacionyderechoModel->getEducacionId($id);
            foreach ($ed as $eyd) {
                $data['titulo'] = $eyd->titulo;
                $data['descripcion'] = $eyd->descripcion;
                $data['id'] = $eyd->id;
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
            $this->load->view('educacionyderechos/Admin_educationyderechosEdita',$data);  
        
        }else{
            redirect('Panel', 'refresh');
        }
    }
    public function unlink(){
        //$id,imagePath,pdfPath;
        if($this->session->userdata('permitido') && $this->session->userdata('ED') == 1){
            $id = $this->input->post('id');
            $imagePath = $this->input->post('img');
            $pdfPath = $this->input->post('pdf');
            if($id != null && $imagePath != null && $pdfPath != null){
                if(file_exists($imagePath) && file_exists($pdfPath)){
                    if(unlink($imagePath)&&unlink($pdfPath)){
                        $this->educacionyderechoModel->deleteForo($id);
                    }

                }
                else{
                    $result = $this->AudiocuentosModel->deleteForo($id);
                }


                $result1 = $this->educacionyderechoModel->getEducacionNew($this->session->userdata('id'));
                $educa = new Educaciones();
                if($result1 != FALSE){
                    $flag = "true";

                    foreach ($result1 as $educacion) {
                        array_push($educa->educacion,$flag,$educacion->id,$educacion->imagen,$educacion->titulo,$educacion->descripcion,$educacion->fecha,$educacion->pdfPath);
                    }
                    echo json_encode($educa);
                }
                else{
                    $flag= "false";
                    array_push($educa->educacion,$flag);
                    echo json_encode($educa);
                }
            
            }
        }else{
            redirect('Panel', 'refresh');
        }
    }
}
