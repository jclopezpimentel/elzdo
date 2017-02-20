<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libro extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('consultas_libro');
    }
    
    public function index()
    {
        $data['data_libro'] = $this->consultas_libro->get_libro();
        $data['login'] = false;
        $data['inicio'] = '';
        $data['secuenciasdidacticas'] = '';
        $data['educacionyderechos'] = '';
        $data['promoradio'] = '';
        $data['audiocuentos'] = '';
        $data['canciones'] = '';
        $data['videos'] = '';
        $data['libros'] = 'active';
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
                $this->load->view('Libro/libro',$data);
        }else{
            $this->load->view('Libro/libro',$data);
        }
    }
    
    
        public function filter(){
        $palabra = $this->input->post("search");
        $datos = $this->consultas_libro->filter($palabra);
            foreach ($datos  as $datos_libro):
                ?>
                <div class="row">
                <div class="col-md-4">
                    <img class="img-responsive imgLibro"  alt="SoundCloud" src="<?=$datos_libro['imagen'];?>" />
                </div>
                <div class="col-md-8">
                    <p class="pTituloLibro"><?=$datos_libro['titulo']; ?> </p>
                    <p class="pDes"> <?=nl2br($datos_libro['Descripcion']); ?></p>
                    <?php if($this->session->userdata('logueado')){ ?>
                        <button id="descargar" class="btn btn-primary" name="DESCARGAR"><a id="pdf" style="color:white;text-decoration: none" target="_blank" href="<?=$datos_libro['pdf'];?>" onclick="setHistorial(<?=$datos_libro['id']?>,'Libros',<?=$this->session->userdata('id') ?>,<?=$datos_libro['administrador']?>)">Descargar</a></button>
                    <?php }else{?>
                        <button id="descargar" class="btn btn-primary"name="DESCARGAR"><a id="pdf" style="color:white;text-decoration: none" target="_blank" onclick="downloadAlert()">Descargar</a></button>
                    <?php }?>

                </div>  
                </div>
                <div class="element-separator sep"><hr></div>
                <?php
            endforeach;

    }
}
