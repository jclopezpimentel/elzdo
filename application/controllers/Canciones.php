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
class delDisco{
    public $del;
    public $canciones = array();
}
class Canciones extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('cancionesModel');

    }
    
    public function index()
    {   $data['inicio'] = '';
        $data['secuenciasdidacticas'] = '';
        $data['educacionyderechos'] = '';
        $data['promoradio'] = '';
        $data['audiocuentos'] = '';
        $data['canciones'] = 'active';
        $data['videos'] = '';
        $data['libros'] = '';
        $data['nosotros'] = '';
        $data['contacto'] = '';
        $result = $this->cancionesModel->getDiscos();
        $data['discos'] = $result->result_array();
        $row = null;
        $result2 = null;
        $idDisco = null;
        if($result->num_rows()>0){
            $row = $result->row();
            $idDisco = $row->id;
            $result2 = $this->cancionesModel->getMusica($idDisco);
        }
        $results = $this->cancionesModel->listar_grados();
        $data['grados'] = $results;

        $data['musica'] = $result2;
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
                $data['ocupacion'] = "No especificada";
            }
        }
        
        $this->load->view('canciones/canciones',$data);
    }


    public function Cancion(){
        $cancion = $this->input->get('c');
        if($cancion == 0){
                redirect('Canciones','refresh');
                
            }else{
                $data['inicio'] = '';
                $data['secuenciasdidacticas'] = '';
                $data['educacionyderechos'] = '';
                $data['promoradio'] = '';
                $data['audiocuentos'] = '';
                $data['canciones'] = 'active';
                $data['videos'] = '';
                $data['libros'] = '';
                $data['nosotros'] = '';
                $data['contacto'] = '';
                $data['cancion'] = $this->cancionesModel->getCancion($cancion);
                $can = $this->cancionesModel->getCancionFb($cancion);
                foreach ($can as $cans) {
                        $disco=$cans->idDisco;                                                
                    }
                $result = $this->cancionesModel->getDiscos();
                    $data['discos'] = $result->result_array();
                    $row = null;
                    $result2 = null;
                    $result2 = $this->cancionesModel->getMusica($disco);
                    $disc = $this->cancionesModel->getDisco($disco);
                    foreach ($disc as $discos) {
                        $data['disconame']=$discos->nombre; 
                        $data['discoimg']=$discos->imagen;                                                 
                    }
                    $results = $this->cancionesModel->listar_grados();
                    $data['grados'] = $results;
                    
                    $data['musica'] = $result2;
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
                            $data['ocupacion'] = "No especificada";
                        }
                    }
                    
                    $this->load->view('canciones/canciones',$data);
            }

    }


    public function AdminDisco()
    {   
        if($this->session->userdata('permitido') && $this->session->userdata('CN') == 1){
            $data['flag'] = null;
            $result = $this->cancionesModel->listar_grados();
            $data['grados'] = $result;
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
            $this->load->view('canciones/AdminDisco',$data);

        }else{
            redirect('Panel', 'refresh');
        }
    }
    
    public function editar()
    {   
        if($this->session->userdata('permitido') && $this->session->userdata('CN') == 1){
            $id = $this->input->get('id');
            $discos = $this->cancionesModel->getDisco($id);
            foreach ($discos as $ctn) {
                $data['nombreDisco'] = $ctn->nombre;
                $data['autor'] = $ctn->autor;
                $data['descripcion'] = $ctn->descripcion;
                $grado = $ctn->gradoEscolar;
            }
            $gradodisco = $this->cancionesModel->getGradosId($grado);
            $Canciones = $this->cancionesModel->getCanciones($id);
            $data['canciones'] = $Canciones;
            $data['disco'] = $gradodisco;
            $data['id'] = $id;
            $data['flag'] = null;
            $result = $this->cancionesModel->listar_grados();
            $data['grados'] = $result;
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
            $this->load->view('canciones/AdminDiscoEdita',$data);

        }else{
            redirect('Panel', 'refresh');
        }
    }

    public function edit()
    {   
        if($this->session->userdata('permitido') && $this->session->userdata('CN') == 1){
            $id = $this->input->post('id');
            $nombre = $this->input->post('disco');
            $autor = $this->input->post('autor');
            $descripcion = $this->input->post('descripcion');
            $gradoEscolar = $this->input->post('gradoEscolar');
            $flag = "1";
            $discos = $this->cancionesModel->getDisco($id);
            foreach ($discos as $ctn) {
                $data['nombreDisco'] = $ctn->nombre;
                $data['autor'] = $ctn->autor;
                $data['descripcion'] = $ctn->descripcion;
                $grado = $ctn->gradoEscolar;
                $imagen = $ctn->imagen;
            }
            $rutas = explode("/", $imagen);
            $config['upload_path'] = $rutas[0].'/'.$rutas[1];
            $config['allowed_types'] = "*";
            $config['max_size'] = "1024000000";
            $this->load->library('upload',$config);
            if($_FILES['portada']['size'] > 0){
                if($_FILES['portada']['type'] == "image/jpeg" || $_FILES['portada']['type'] == "image/png"){
                    if ($this->upload->do_upload('portada')){
                        $imgNew = $rutas[0].'/'.$rutas[1].'/'.$this->upload->data('file_name');
                        if(file_exists($imagen)){
                            unlink($imagen);
                        }
                        $imagen = $imgNew;
                    }else{
                        $flag = "2";
                    }
                }else{
                    $flag = "0";
                }
            }
            if($flag == "1"){
                $this->cancionesModel->editar($nombre,$autor,$descripcion,$gradoEscolar,$id,$imagen);
                $data['flag'] = "1";
            }else{
                $data['flag'] = $flag;
            }

            $discos = $this->cancionesModel->getDisco($id);
            foreach ($discos as $ctn) {
                $data['nombreDisco'] = $ctn->nombre;
                $data['autor'] = $ctn->autor;
                $data['descripcion'] = $ctn->descripcion;
                $grado = $ctn->gradoEscolar;
            }
            $Canciones = $this->cancionesModel->getCanciones($id);
            $data['canciones'] = $Canciones;
            $gradodisco = $this->cancionesModel->getGradosId($grado);
            $data['disco'] = $gradodisco;
            $data['id'] = $id;
            $result = $this->cancionesModel->listar_grados();
            $data['grados'] = $result;
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
            $this->load->view('canciones/AdminDiscoEdita',$data);

        }else{
            redirect('Panel', 'refresh');
        }
    }

    public function getDisco($id) {
        
        $result = $this->cancionesModel->getDisco($id);
        $result2 = $this->cancionesModel->getMusic($id);
        $cd = new Discos();
        if($this->session->userdata('logueado')){
            $cd->login=1;
            $cd->idusr=$this->session->userdata('id');
        }else{
            $cd->login=0;
        }
        foreach ($result as $disco) {
            $cd->id=$disco->id;
            $cd->nombre=$disco->nombre;
            $cd->imagen=$disco->imagen;
            $cd->descrip=nl2br($disco->descripcion);
            $cd->zipuri=$disco->zip;
            $cd->idadm=$disco->administrador;
            $h = 0;
            foreach ($result2 as $cancion){
               
                array_push($cd->canciones, $cancion->archivo,$cancion->titulo,$cancion->id);
            }
            echo json_encode($cd);                                                  
        }
    }

    public function getDiscoGrado() {
        $id = $this->input->post('ID');
        $result = $this->cancionesModel->getDiscoGrado($id);
        $cd = new newDisco();
        if($this->session->userdata('logueado')){
            $cd->login=1;
            $cd->idusr=$this->session->userdata('id');
        }else{
            $cd->login=0;
        }
        foreach ($result as $disco) {
            array_push($cd->canciones, $disco->id,$disco->nombre);                                                  
        }
        echo json_encode($cd);
    }



    public function AdminDeleteDisco()
    {
        if($this->session->userdata('permitido') && $this->session->userdata('CN') == 1){
            $admin= $this->session->userdata('id');
            if($this->session->userdata('tipo') == "Recursos"){
                $result = $this->cancionesModel->getDiscoAdmin($admin);
            }else{
                $result = $this->cancionesModel->getDiscoAdminGral();
            }
            $data['tabla'] = $result;
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
            $this->load->view('canciones/AdminDisco2',$data);
        }
    }
    
    
    public function delete_disco() {
        if($this->session->userdata('permitido') && $this->session->userdata('CN') == 1){
            $id = $this->input->post('id');
            $nameFolder = $this->input->post('nombre');
            if($id != null && $nameFolder != null){
                $result = $this->cancionesModel->delete_canciones($id);
                $results = $this->cancionesModel->delete_disco($id);
                $this->eliminarDir("Discos/".$nameFolder);
        //        
                $result = $this->cancionesModel->getDiscoNew($this->session->userdata('id'));
                $disco = new newDisco();
                if($result != FALSE){
                    $flag = "true";

                    foreach ($result as $canciones) {
                        array_push($disco->canciones,$flag,$canciones->id,$canciones->nombreDisco,$canciones->autor,$canciones->nombre,$canciones->fecha,$canciones->zip);
                    }
                    echo json_encode($disco);
                }
                else{
                    $flag= "false";
                    array_push($disco->canciones,$flag);
                    echo json_encode($disco);
                }
            }
        }else{
            redirect('Panel', 'refresh');
        }
    }
    
    function eliminarDir($carpeta)
    {
        foreach(glob($carpeta . "/*") as $archivos_carpeta)
        {
            
            if (is_dir($archivos_carpeta))
            {
                $this->removeDirectory($archivos_carpeta);
            }
            else
            {
                unlink($archivos_carpeta);
            }
        }

        rmdir($carpeta);
    }
    function removeDirectory($path)
    {
        $path = rtrim( strval( $path ), '/' ) ;

        $d = dir( $path );

        if( ! $d )
            return false;

        while ( false !== ($current = $d->read()) )
        {
            if( $current === '.' || $current === '..')
                continue;

            $file = $d->path . '/' . $current;

            if( is_dir($file) )
                removeDirectory($file);

            if( is_file($file) )
                unlink($file);
        }

        rmdir( $d->path );
        $d->close();
        return true;
    }
    public function subir_disco() {
        $data['flag'] = null;
        if($this->session->userdata('permitido') && $this->session->userdata('CN') == 1){
            if(isset($_FILES['zipDisco'])){
             $extension = explode(".",$_FILES["zipDisco"]["name"]);
            $mi_archivo = 'zipDisco';
            if ($_FILES['portada']['type'] == 'image/jpeg' || $_FILES['portada']['type'] == 'image/png') {
                $extensionimagen = explode(".",$_FILES["portada"]["name"]);

                $disco = $this->input->post('disco');
                $autor = $this->input->post('autor');
                $id = $this->session->userdata('id');
                $grado = $this->input->post('gradoEscolar');
                $descripcion= $this->input->post('descripcion');
                $fecha = date('Y-m-d');

                if(!is_dir('Discos/'.$disco.'/')){
                            @mkdir('Discos/'.$disco.'/',0755);
                }
              //echo $disco;
              $config['upload_path'] = "Discos/".$disco."/";
              $config['file_name'] = $extension[0];
              $config['allowed_types'] = "*";
              $config['max_size'] = "1024000000";
              $config['max_width'] = "1024000000";
              $config['max_height'] = "1024000000";


              $this->load->library('upload', $config);

        if($this->upload->do_upload('portada')){
                $portada = "Discos/".$disco."/".$this->upload->data('file_name');       
        }      
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
           $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }
        $data['uploadSuccess'] = $this->upload->data();
        $mp3 = "Discos/".$disco."/".$this->upload->data('file_name');
                            $mp3Name = $this->upload->data('file_name');
                            $url_zip = "Discos/".$disco."/".$disco.".zip";
                            $enzipado = new ZipArchive();
                            if ($enzipado->open("Discos/".$disco."/".$disco.".zip", ZIPARCHIVE::CREATE)===TRUE) {
                                    $enzipado->addFile($mp3,$this->upload->data('file_name'));
                                    $enzipado->close();

                                    
                                         $info = pathinfo($mp3Name);
                                         $extension = $info['extension'];
                                         $idDisco = $this->cancionesModel->crear_disco($disco,$autor,$grado,$id,$fecha,$portada,$descripcion,$url_zip);

                                          $titulo = basename($mp3Name, '.'.$extension);
                                          $title = str_replace("_", " ", $titulo);
                                          $this->cancionesModel->crear_cancion($mp3,$title,$idDisco);


                            }
                //unlink($mp3);
                $result = $this->cancionesModel->listar_grados();
                $data['grados'] = $result;
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
                $this->load->view('canciones/AdminDisco',$data);
    
              }else{
                $data['flag'] = "3";

              }

          }else{
            redirect('Panel', 'refresh');

        }
    }
}





          /*  if(isset($_FILES['zipDisco'])){
                $extension = explode(".",$_FILES["zipDisco"]["name"]);
                $num = count($extension)-1;
                if($extension[$num] == 'mp3') {
                    if ($_FILES['portada']['type'] == 'image/jpeg' || $_FILES['portada']['type'] == 'image/png') {
                        $disco = $this->input->post('disco');
                        $autor = $this->input->post('autor');
                        $id = $this->session->userdata('id');
                        $grado = $this->input->post('gradoEscolar');
                        $descripcion= $this->input->post('descripcion');
                        $fecha = date('Y-m-d');

                        if(!is_dir('Discos/'.$disco.'/')){
                            @mkdir('Discos/'.$disco.'/',0755);
                        }
                        //$portada  = "Discos/".$disco."/";
                        //$zip  = "Discos/".$disco."/".$_FILES["zipDisco"]["name"];
                        //$url_zip = "Discos/".$disco."/";
                        $config['upload_path'] = "Discos/".$disco."/";
                        $config['allowed_types'] = "*";
                        $config['max_size'] = "1024000000";

                        $this->load->library('upload', $config);

                        if($this->upload->do_upload('portada')){
                                $portada = "Discos/".$disco."/".$this->upload->data('file_name');       
                            }
                        if ($this->upload->do_upload('zipDisco')) {
                           /* $data['uploadError'] = $this->upload->display_errors();
                            //echo $this->upload->display_errors();
                            $data['flag'] = "3";

                        }else{
                            //if($this->upload->do_upload('portada')){
                            //    $portada = "Discos/".$disco."/".$this->upload->data('file_name');       
                           // }

                            $mp3 = "Discos/".$disco."/".$this->upload->data('file_name');
                            $mp3Name = $this->upload->data('file_name');
                            $url_zip = "Discos/".$disco."/".$disco.".zip";
                            $enzipado = new ZipArchive();
                            if ($enzipado->open("Discos/".$disco."/".$disco.".zip", ZIPARCHIVE::CREATE)===TRUE) {
                                    $enzipado->addFile($mp3,$this->upload->data('file_name'));
                                    $enzipado->close();

                                    
                                         $info = pathinfo($mp3Name);
                                         $extension = $info['extension'];
                                         $idDisco = $this->cancionesModel->crear_disco($disco,$autor,$grado,$id,$fecha,$portada,$descripcion,$url_zip);

                                          $titulo = basename($mp3Name, '.'.$extension);
                                          $title = str_replace("_", " ", $titulo);
                                          $this->cancionesModel->crear_cancion($mp3,$title,$idDisco);


                            }else{
                               $data['flag'] = "3";
                            }
                            $data['flag'] = "1";
                        }
                    }
                    else{
                        $data['flag'] = "2";
                    }
                }
                else{
                    $data['flag'] = "0";
                }
                $result = $this->cancionesModel->listar_grados();
                $data['grados'] = $result;
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
                $this->load->view('canciones/AdminDisco',$data);
            }
        }else{
            redirect('Panel', 'refresh');
        }*/
   // }
    //}
    public function agregar(){
        if($this->session->userdata('permitido') && $this->session->userdata('CN') == 1){
            $result = $this->cancionesModel->getDiscoAdmin($this->session->userdata('id'));
            $data['grados'] = $result;
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
            $this->load->view('canciones/AdminDiscoAgrega',$data);
        }else{
            redirect('Panel', 'refresh');   
        }
    }
    public function subircancion(){
        if($this->session->userdata('permitido') && $this->session->userdata('CN') == 1){
            $disco = $this->input->post('disco');
            if(isset($_FILES['file'])){
                $extension = explode(".",$_FILES["file"]["name"]);
                $num = count($extension)-1;
                $data['flag'] = null;
                if($extension[$num] == 'mp3') {
                    $p = $this->cancionesModel->getPath($disco);
                    foreach ($p as $disc) {
                        $url=$disc->zip;                                                
                    }
                    $rutas = explode("/", $url);
                    $config['upload_path'] = $rutas[0]."/".$rutas[1]."/";
                    $config['allowed_types'] = "*";
                    $config['max_size'] = "1024000000";
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload('file')) {
                        $mp3 = $rutas[0]."/".$rutas[1]."/".$this->upload->data('file_name');
                            $mp3Name = $this->upload->data('file_name');
                            $enzipado = new ZipArchive();
                            if ($enzipado->open($url, ZIPARCHIVE::CREATE)===TRUE) {
                                $enzipado->addFile($mp3,$this->upload->data('file_name'));
                                $enzipado->close();
                                $info = pathinfo($mp3Name);
                                $extension = $info['extension'];
                                $titulo = basename($mp3Name, '.'.$extension);
                                $title = str_replace("_", " ", $titulo);
                                $this->cancionesModel->crear_cancion($mp3,$title,$disco);
                                    
                            }else{
                                $data['flag'] = "2";
                            }
                            $data['flag'] = "1";
                    }else{
                        $data['flag'] = "2";    
                    }
                }else{
                    $data['flag'] = "0";
                }
                $result = $this->cancionesModel->getDiscoAdmin($this->session->userdata('id'));
                $data['grados'] = $result;
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
                $this->load->view('canciones/AdminDiscoAgrega',$data);
            }
        }else{
            redirect('Panel', 'refresh');   
        }   
    }

    public function borrarCancion(){
        $id = $this->input->post('id');
        $delete = new delDisco();
        $cancion = $this->cancionesModel->getCancionFb($id);
        if($cancion){
            if($this->cancionesModel->delete_cancion($id)){
                foreach ($cancion as $cans) {
                    $archivo=$cans->archivo; 
                    $disco= $cans->idDisco;                                               
                }
                $p = $this->cancionesModel->getPath($disco);
                foreach ($p as $disc) {
                    $url=$disc->zip;                                                
                }
                unlink($archivo);
                $enzipado = new ZipArchive();
                $rutas = explode("/", $archivo);
                if ($enzipado->open($url) === TRUE) {
                    $enzipado->deleteName($rutas[2]);
                    $enzipado->close();
                }
                $songs = $this->cancionesModel->getMusic($disco);
                foreach ($songs as $sng) {
                    $ids=$sng->id;
                    $titulo=$sng->titulo;
                    array_push($delete->canciones,$ids,$titulo);                                                
                }
                $delete->del = true;
            }else{
                $delete->del = false;
            }
        }else{
            $delete->del = false;
        }
        echo json_encode($delete);
    }

}


