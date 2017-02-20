<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLibro extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('LibroModel');
    }
    
    public function index()
    {
        if($this->session->userdata('permitido') && $this->session->userdata('LB') == 1){
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
            $this->load->view('Libro/adminLibro',$data);
        
        }else{
            redirect('Panel', 'refresh');
        }
    }


    public function editar()
    {
        if($this->session->userdata('permitido') && $this->session->userdata('LB') == 1){
            $id = $this->input->get('id');
            $lb = $this->LibroModel->getLibro($id);
            foreach ($lb as $ctn) {
                $data['titulo'] = $ctn->titulo;
                $data['descripcion'] = $ctn->Descripcion;
            
            }
            $data['id'] = $id;
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
            $this->load->view('Libro/adminLibroEdita',$data);
        
        }else{
            redirect('Panel', 'refresh');
        }
    }

    public function edit()
    {
        if($this->session->userdata('permitido') && $this->session->userdata('LB') == 1){
            $id = $this->input->post('id');
            $titulo = $this->input->post('titulo');
            $descripcion = $this->input->post('descrip');
            $flag = "1";
            $lb = $this->LibroModel->getLibro($id);
            foreach ($lb as $ctn) {
                $data['titulo'] = $ctn->titulo;
                $data['descripcion'] = $ctn->Descripcion;
                $pdf = $ctn->pdf;
                $imagen = $ctn->imagen;
            }
            $rutas = explode("/", $pdf);
            $config['upload_path'] = $rutas[0].'/'.$rutas[1];
            $config['allowed_types'] = "*";
            $config['max_size'] = "1024000000";
            $this->load->library('upload',$config);
            if($_FILES['image']['size'] > 0){
                if($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png"){
                    if ($this->upload->do_upload('image')){
                        $portadaNew = $rutas[0].'/'.$rutas[1].'/'.$this->upload->data('file_name');
                        if(file_exists($imagen)){
                            unlink($imagen);
                        }
                        $imagen = $portadaNew;
                    }else{
                        $flag = "3";
                    }
                }else{
                    $flag = "0";
                }
            }
            if($_FILES['libro']['size'] > 0){
                if($_FILES['libro']['type'] =="application/pdf" && $flag != "0"){
                    if($this->upload->do_upload('libro')){
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
                $this->LibroModel->editar($titulo,$descripcion,$id,$pdf,$imagen);
                $data['flag'] = "1";
            }else{
                $data['flag'] = $flag;
            }

            $lb = $this->LibroModel->getLibro($id);
            foreach ($lb as $ctn) {
                $data['titulo'] = $ctn->titulo;
                $data['descripcion'] = $ctn->Descripcion;
            
            }
            $data['id'] = $id;
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
            $this->load->view('Libro/adminLibroEdita',$data);
        
        }else{
            redirect('Panel', 'refresh');
        }
    }

    public function saveLibro()
    {
        if($this->session->userdata('permitido') && $this->session->userdata('LB') == 1){
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
            if ($_FILES['image']["error"] > 0)
              {
              echo "Error: " . $_FILES['image']['error'] . "<br>";
              }else{
                     $tipo= $_FILES['image']['type']; 
                    if (strpos($tipo, "jpeg")||strpos($tipo, "png") ) {  
                            //$nombreImg=  str_replace(" ","_",$_FILES['image']['name']); 
                            $tipo= $_FILES['libro']['type']; 
                            if (strpos($tipo, "pdf")) {
                                //$nombreLib= str_replace(" ","_",$_FILES['libro']['name']);
                                $titulo = $_REQUEST['titulo'];
                                @mkdir("Libros/".$titulo,0755);
                                $config['upload_path'] = "Libros/".$titulo;
                                $config['allowed_types'] = "*";
                                $config['max_size'] = "1024000000";
                                $this->load->library('upload',$config);
                            
                                if($this->upload->do_upload('image')){
                                    $nombreImg = "Libros/".$titulo.'/'.$this->upload->data('file_name');
                                        if($this->upload->do_upload('libro')){
                                            $nombreLib = "Libros/".$titulo.'/'.$this->upload->data('file_name');
                                            $descripcion = $_REQUEST['descrip'];
                                            $fecha= date("Y-m-d");
                                            $this->LibroModel->set_libro($titulo, $nombreLib, $descripcion, $nombreImg,$this->session->userdata('id'), $fecha );
                                            $data['flag'] = "1";
                                        }else{$data['flag'] = "2";
                                        //error al cargar libro;
                                        }
                                }else{$data['flag'] = "3";
                                //error al cargar imagen
                                }
                                    
                                    
                                
                            }else{
                                //formato de libro invalido;
                                    $data['flag'] = "4";
                            }
                    }
                    else{
                            //formato de imagen invalido;
                            $data['flag'] = "5";
                    }

              }

            $this->load->view('Libro/adminLibro',$data);
        }else{
            redirect('Panel', 'refresh');
        }
    }
    
    public function deleteBook()
    {
        if($this->session->userdata('permitido') && $this->session->userdata('LB') == 1){
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
            if($this->session->userdata('tipo') == "Recursos"){
                $data['data_libro'] = $this->LibroModel->get_libro($this->session->userdata('id'));
            }else{
                $data['data_libro'] = $this->LibroModel->get_libroGral();
            }
            $this->load->view('Libro/eliminarLibro',$data);
        
        }else{
            redirect('Panel', 'refresh');
        }
    }
    
    
    
    public function consul(){
        if($this->session->userdata('permitido') && $this->session->userdata('LB') == 1){
            $id = $_REQUEST['id'];
            $datos = $this->LibroModel->consult($id);
            if($this->session->userdata('tipo') == "Recursos"){
                    foreach ($datos  as $datos_libro):      
                    echo "<h3 class='aTituloLibro'>Titulo: ".$datos_libro['titulo']."</h3>";
                    echo"<div class='col-md-5'>";
                    echo "<img  src='".$datos_libro['imagen']."' class='img-rounded imgALibro responsive' />";
                    echo "</div>";
                    echo "<div class='col-md-7'>";
                    echo "<h5>Descripción:<br>".$datos_libro['Descripcion']."</h5>";
                    echo "<button class='btn btn-primary'><a style='color:white;text-decoration:none' href='editaLibro?id=".$id."'>Editar</a></button>";
                    echo "</div>";
                endforeach;
            }else{
                foreach ($datos  as $datos_libro):          
                    echo "<h3 class='aTituloLibro'>Titulo: ".$datos_libro['titulo']."</h3>";
                    echo"<div class='col-md-5'>";
                    echo "<img  src='".$datos_libro['imagen']."' class='img-rounded imgALibro responsive' />";
                    echo "</div>";
                    echo "<div class='col-md-7'>";
                    echo "<h4>Administrador: ".$datos_libro['nombre']."</h4>";
                    echo "<h5>Descripción:<br>".$datos_libro['Descripcion']."</h5>";
                    echo "</div>";
                endforeach;
            } 
        }else{
            redirect('Panel', 'refresh');
        }
}
        public function delete(){
            
            if($this->session->userdata('permitido') && $this->session->userdata('LB') == 1){
                
                $libro = $this->input->post("libro");
                    if($libro != null){
                    $data = $this->LibroModel->consult($libro);
                     foreach ($data  as $datos_libro): 
                    if(unlink($datos_libro['imagen'])){
                        if(unlink($datos_libro['pdf'])){
                            $datos = $this->LibroModel->deleteLibro($libro);
                            if($datos){
                                $data['flag'] = '1';
                            }else{
                                $data['flag'] = '0';
                            }
                        }
                        else{
                            $data['flag'] = '1';
                            $datos = $this->LibroModel->deleteLibro($libro);
                        }
                    }
                    else{
                        $data['flag'] = '1';
                        $datos = $this->LibroModel->deleteLibro($libro);
                    }
                    endforeach; 
                }
                $data['data_libro'] = $this->LibroModel->get_libro($this->session->userdata('id'));
                $data['nombre'] =  $this->session->userdata('nombre');
                $data['foto'] = $this->session->userdata('foto');
                $data['SD'] = $this->session->userdata('SD');
                $data['ED'] = $this->session->userdata('ED');
                $data['PR'] = $this->session->userdata('PR');
                $data['AC'] = $this->session->userdata('AC');
                $data['VD'] = $this->session->userdata('VD');
                $data['CN'] = $this->session->userdata('CN');
                $data['LB'] = $this->session->userdata('LB');
                $data['tipo'] = $this->session->userdata('tipo');
                $this->load->view('Libro/eliminarLibro',$data);
            }else{
                redirect('Panel', 'refresh');
            }
        }
    
}
