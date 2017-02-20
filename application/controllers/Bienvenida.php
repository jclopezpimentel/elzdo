<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Discos{
 public $id;
 public $nombre;
 public $idusr;
 public $idadm;
 public $imagen;
 public $login;
 public $descrip;
 public $zipuri;
 public $canciones = array();
}
class newDisco{
    public $canciones = array();
}
class Sds{
    public $secuencias=array();
}
class Grados{
    public $grados =array();
}
class Bienvenida extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('secuenciaDidacticaModel');
        $this->load->model('cancionesModel');
    }
    
    public function index()
    {
        $data['inicio'] = '';
        $data['secuenciasdidacticas'] = 'active';
        $data['educacionyderechos'] = '';
        $data['promoradio'] = '';
        $data['audiocuentos'] = '';
        $data['canciones'] = '';
        $data['videos'] = '';
        $data['libros'] = '';
        $data['nosotros'] = '';
        $data['contacto'] = '';
        $result = $this->secuenciaDidacticaModel->imagen();
        $data['imagen'] =  $result;
        $result1 = $this->secuenciaDidacticaModel->getSecuencias();
        $data['secuencias']=$result1;
        $results = $this->cancionesModel->listar_grados();
        $data['grados'] = $results;
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
            
            $this->load->view('secuenciaDidactica/bienvenida',$data) ;
        }else{
            $this->load->view('secuenciaDidactica/bienvenida',$data) ;
        }      
    }
    
    public function secuencia()
    {
        $id = $this->input->get('id');
        if($id == 0){
            redirect('Bienvenida','refresh');
                
        }else{
            $result = $this->secuenciaDidacticaModel->imagenSecuencia($id);
            $data['imagen'] =  $result;
            $result1 = $this->secuenciaDidacticaModel->getSecuencias();
            $data['secuencias']=$result1;
            $results = $this->cancionesModel->listar_grados();
            $data['grados'] = $results;
            $data['login'] = false;
            $data['inicio'] = '';
            $data['secuenciasdidacticas'] = 'active';
            $data['educacionyderechos'] = '';
            $data['promoradio'] = '';
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
                
                $this->load->view('secuenciaDidactica/bienvenida',$data) ;
            }else{
                $this->load->view('secuenciaDidactica/bienvenida',$data) ;
            }
        }      
    }
    public function getSecuenciaGrado(){
        $id = $this->input->post('ID');
        $result = $this->secuenciaDidacticaModel->getSecuenciaGrado($id);
        $cd = new newDisco();
        if($this->session->userdata('logueado')){
            $cd->login=1;
            $cd->idusr=$this->session->userdata('id');
        }else{
            $cd->login=0;
        }
        foreach ($result as $disco) {
            array_push($cd->canciones, $disco->id,$disco->titulo);                                                  
        }
        echo json_encode($cd);
    }

    public function subir(){
        if($this->session->userdata('permitido') && $this->session->userdata('SD') == 1){
            $flag="";
            if($_FILES['pdf']['size'] > 0 && $_FILES['imagen']['size'] > 0){
                if($_FILES['pdf']['type'] =="application/pdf" && ($_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")){
                      $title = $this->input->post('titulo');
                      $grado = $this->input->post('gradoEscolar');
                      $admi = $this->session->userdata('id');
                      $fecha = date("Y-m-d");
                      $rutaServidor = 'secuenciaDidactica';
                      $nuevaCarpeta = '/'.$title;
                      $newRoute = $rutaServidor.$nuevaCarpeta; 
                      @mkdir($newRoute,0755);
                      $nombreImagen = $_FILES['imagen']['name'];
                      $nombrePdf = $_FILES['pdf']['name'];
                      //$portada = $newRoute.'/'.$nombreImagen;
                      //$pdf = $newRoute.'/'.$nombrePdf;
                      $config['upload_path'] = $newRoute;
                      $config['allowed_types'] = "*";
                      $config['max_size'] = "1024000000";

                      $this->load->library('upload',$config);
                      
                      if($this->upload->do_upload('pdf')){
                            $pdf = $newRoute.'/'.$this->upload->data('file_name');
                            if($this->upload->do_upload('imagen')){
                                $portada = $newRoute.'/'.$this->upload->data('file_name');
                                $result = $this->secuenciaDidacticaModel->subir($title,$pdf,$portada,$grado,$admi,$fecha);
                                $flag="1";
                            }else{
                                $flag="3";
                            }
                      }
                      else{
                          $flag="2";
                      }

                }
                else{
                      $flag="0";
                }
                $result = $this->secuenciaDidacticaModel->getGrados();
                $data['grados'] =  $result;
                $data['flag'] =$flag;
                $data['nombre'] = $this->session->userdata('nombre');
                $data['foto'] = $this->session->userdata('foto');
                $data['tipo'] = $this->session->userdata('tipo');
                $data['SD'] = $this->session->userdata('SD');
                $data['ED'] = $this->session->userdata('ED');
                $data['PR'] = $this->session->userdata('PR');
                $data['AC'] = $this->session->userdata('AC');
                $data['VD'] = $this->session->userdata('VD');
                $data['CN'] = $this->session->userdata('CN');
                $data['LB'] = $this->session->userdata('LB');
                $this->load->view('adminSD/admiSD',$data);

            }
          }else{
              redirect('Panel', 'refresh');
          }
    }
    
    public function colaboracion()
    {
        $this->load->view('secuenciaDidactica/colaboracion');
    }
    public function newGrado(){
        $grado1 = $this->input->post('newname');
        if($grado1 != null ){
            if($this->secuenciaDidacticaModel->getGradosCont($grado1) == 0){
                $result = $this->secuenciaDidacticaModel->addGrado($grado1);
                $result2 = $this->secuenciaDidacticaModel->getGradosNew();
                $grados = new Grados();
                if($result2 != FALSE){
                    foreach ($result2 as $grado) {
                        array_push($grados->grados,$grado->id,$grado->nombre);
                    }
                    echo json_encode($grados);
                }
            }else{
                $grados = new Grados();
                echo json_encode($grados);
            }
        }        
    }
    public function admiSD(){
        if($this->session->userdata('permitido') && $this->session->userdata('SD') == 1){
            $result = $this->secuenciaDidacticaModel->getGrados();
            $data['grados'] =  $result;
            $data['flag'] = null;
            $data['nombre'] = $this->session->userdata('nombre');
            $data['foto'] = $this->session->userdata('foto');
            $data['tipo'] = $this->session->userdata('tipo');
            $data['SD'] = $this->session->userdata('SD');
            $data['ED'] = $this->session->userdata('ED');
            $data['PR'] = $this->session->userdata('PR');
            $data['AC'] = $this->session->userdata('AC');
            $data['VD'] = $this->session->userdata('VD');
            $data['CN'] = $this->session->userdata('CN');
            $data['LB'] = $this->session->userdata('LB');
            $this->load->view('adminSD/admiSD',$data);
        }else{
            redirect('Panel','refresh');
        }
    }
    
    public function deleteSD(){
        if($this->session->userdata('permitido') && $this->session->userdata('SD') == 1){
            $admin =  $this->session->userdata('id');
            if($this->session->userdata('tipo') == "Recursos"){
                $result = $this->secuenciaDidacticaModel->getSD($admin);
            }else{
                $result = $this->secuenciaDidacticaModel->getSDGral();
            }
            $data['tabla'] =  $result;
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
            $this->load->view('adminSD/deleteSD',$data);

        }else{
            redirect('Panel', 'refresh');
        }
    }
    
    public function deleteSdById(){
        if($this->session->userdata('permitido') && $this->session->userdata('SD') == 1){
            $id = $this->input->post('id');
            $imagePath = $this->input->post('img');
            $pdfPath = $this->input->post('pdf');
            $carpeta = $this->input->post('folder');
            if($id != null && $imagePath != null && $pdfPath != null){
                if(file_exists($imagePath) && file_exists($pdfPath)){
                    if(unlink($imagePath)&& unlink($pdfPath)){
                        $this->secuenciaDidacticaModel->deleteSD($id);
                    }

                }
                else{
                    
                    $result = $this->secuenciaDidacticaModel->deleteSD($id);
                }


                $result1 = $this->secuenciaDidacticaModel->getSDNew($this->session->userdata('id'));
                $secudida = new Sds();
                if($result1 != FALSE){
                    $flag = "true";

                    foreach ($result1 as $sdidacticas) {
                        array_push($secudida->secuencias,$flag,$sdidacticas->id,$sdidacticas->titulo,$sdidacticas->pdf,$sdidacticas->portada,$sdidacticas->nombre,$sdidacticas->fecha);
                    }
                    echo json_encode($secudida);
                }
                else{
                    $flag= "false";
                    array_push($secudida->secuencias,$flag);
                    echo json_encode($secudida);
                }
            }
        }else{
            redirect('Panel','refresh');
        }
    }
    public function getSecuenciaById(){
            $id = $this->input->post("id");
            //if($id != null){
                $result = $this->secuenciaDidacticaModel->getSecuenciaById($id);
                $secudida = new Sds();
                foreach ($result as $sdidacticas) {
                    if($this->session->userdata('logueado')){
                        array_push($secudida->secuencias,$sdidacticas->id,$sdidacticas->titulo,$sdidacticas->pdf,$sdidacticas->portada,$sdidacticas->administrador,$this->session->userdata('id'),"1");
                    }else{
                        array_push($secudida->secuencias,$sdidacticas->id,$sdidacticas->titulo,$sdidacticas->pdf,$sdidacticas->portada,$sdidacticas->administrador,"0","0");
                    }
                }
                echo json_encode($secudida);
            //}
    }
    

    public function editar(){
        if($this->session->userdata('permitido') && $this->session->userdata('SD') == 1){
            $id = $this->input->get('id');
            $result = $this->secuenciaDidacticaModel->getGrados();
            $secuencias = $this->secuenciaDidacticaModel->getSecuenciaById($id);
            foreach ($secuencias as $didacticas) {
                $data['titulo'] = $didacticas->titulo;
                $grado = $didacticas->gradoEscolar;
                $pdf = $didacticas->pdf;
                $portada = $didacticas->portada;
            }
            $gradoSecuencia = $this->secuenciaDidacticaModel->getGradosId($grado);
            $data['id'] = $id;
            $data['grade'] = $gradoSecuencia;
            $data['grados'] =  $result;
            $data['flag'] = null;
            $data['nombre'] = $this->session->userdata('nombre');
            $data['foto'] = $this->session->userdata('foto');
            $data['tipo'] = $this->session->userdata('tipo');
            $data['SD'] = $this->session->userdata('SD');
            $data['ED'] = $this->session->userdata('ED');
            $data['PR'] = $this->session->userdata('PR');
            $data['AC'] = $this->session->userdata('AC');
            $data['VD'] = $this->session->userdata('VD');
            $data['CN'] = $this->session->userdata('CN');
            $data['LB'] = $this->session->userdata('LB');
            $this->load->view('adminSD/editaSD',$data);
        }else{
            redirect('Panel','refresh');
        }
    }
    public function edit(){
        if($this->session->userdata('permitido') && $this->session->userdata('SD') == 1){
            $id = $this->input->post('id');
            $titulo = $this->input->post('titulo');
            $gradoSec = $this->input->post('gradoEscolar');
            $flag = "1";
            $secuencias = $this->secuenciaDidacticaModel->getSecuenciaById($id);
            foreach ($secuencias as $didacticas) {
                $data['titulo'] = $didacticas->titulo;
                $grado = $didacticas->gradoEscolar;
                $pdf = $didacticas->pdf;
                $portada = $didacticas->portada;
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
                $this->secuenciaDidacticaModel->editar($titulo,$gradoSec,$id,$pdf,$portada);
                $data['flag'] = "1";
            }else{
                $data['flag'] = $flag;
            }
            $result = $this->secuenciaDidacticaModel->getGrados();
            $secuencias = $this->secuenciaDidacticaModel->getSecuenciaById($id);
            foreach ($secuencias as $didacticas) {
                $data['titulo'] = $didacticas->titulo;
                $grado = $didacticas->gradoEscolar;
                $pdf = $didacticas->pdf;
                $portada = $didacticas->portada;
            }
            $gradoSecuencia = $this->secuenciaDidacticaModel->getGradosId($grado);
            $data['id'] = $id;
            $data['grade'] = $gradoSecuencia;
            $data['grados'] =  $result;
            $data['nombre'] = $this->session->userdata('nombre');
            $data['foto'] = $this->session->userdata('foto');
            $data['tipo'] = $this->session->userdata('tipo');
            $data['SD'] = $this->session->userdata('SD');
            $data['ED'] = $this->session->userdata('ED');
            $data['PR'] = $this->session->userdata('PR');
            $data['AC'] = $this->session->userdata('AC');
            $data['VD'] = $this->session->userdata('VD');
            $data['CN'] = $this->session->userdata('CN');
            $data['LB'] = $this->session->userdata('LB');
            $this->load->view('adminSD/editaSD',$data);
        }else{
            redirect('Panel','refresh');
        }
    }
}
