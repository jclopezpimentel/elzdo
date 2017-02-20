<?php
    ini_set("SMTP","localhost");
    ini_set("smtp_port",25);
    ini_set("sendmail_from","orbaher7@gmail.com");

class Inicio extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('usuariosModel');
        $this->load->library('session');
        //$this->load->library('mylog');
    }
    
    public function index()
    {
        $data['inicio'] = 'active';
        $data['secuenciasdidacticas'] = '';
        $data['educacionyderechos'] = '';
        $data['promoradio'] = '';
        $data['audiocuentos'] = '';
        $data['canciones'] = '';
        $data['videos'] = '';
        $data['libros'] = '';
        $data['nosotros'] = '';
        $data['contacto'] = '';

        if($this->session->userdata('logueado')){
            $data['id'] = $this->session->userdata('id');
            $data['user'] = $this->session->userdata('nombre');
            $data['email'] = $this->session->userdata('email');
            $fecha = date('Y-m-d H:i:s');
            $this->usuariosModel->log_registro("Log-in",$this->session->userdata('nombre'),$fecha);
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
            
            $this->load->view('inicio/inicio',$data);
        }else{
            $this->load->view('inicio/inicio',$data);
        }
        //$this->mylog->insert("visita a la pagina",false,false,false);
    }
    
    public function registro() {
        if($this->session->userdata('logueado')){
            redirect('/','refresh');
        }else{
            $data['inicio'] = '';
            $data['secuenciasdidacticas'] = '';
            $data['educacionyderechos'] = '';
            $data['promoradio'] = '';
            $data['audiocuentos'] = '';
            $data['canciones'] = '';
            $data['videos'] = '';
            $data['libros'] = '';
            $data['nosotros'] = '';
            $data['contacto'] = '';
            $this->load->view('inicio/registro',$data);
        }
            
    }
    public function login_user() {
        if($this->session->userdata('permitido')){
            $usuario_admin = array(
                        'permitido' => FALSE
                     );
            $this->session->set_userdata($usuario_admin);
        }
        
        $email = $this->input->post('Email');
        $password = $this->input->post('Password');
        $log = $this->usuariosModel->login($email,$password);
        if($log->num_rows() >0){
            foreach ($log->result() as $fila) {
                $usuario_data = array(
                    'logueado' => TRUE,
                    'id' => $fila->id,
                    'nombre' => $fila->nombre,
                    'email' => $fila->email,
                    'gradoestudios' => $fila->gradoEstudios,
                    'estudiante' => $fila->ocupacionEstudiante,
                    'maestro' => $fila->ocupacionMaestro,
                    'padre' => $fila->ocupacionPadreFamilia,
                    'tipoCta' => $fila->tipoCta
                    );
                $this->session->set_userdata($usuario_data);   
            }
            
            echo "true";
        }else{
            echo "false";
        }
    }
    
    public function cerrar_sesion() {
        if($this->session->userdata('logueado')){
            $fecha = date('Y-m-d H:i:s');
            $this->usuariosModel->log_registro("Logout",$this->session->userdata('nombre'),$fecha);
            $this->session->sess_destroy();
            redirect(base_url(),'refresh');

        }else{
            redirect('/', 'refresh');
        }
    }
    public function registrar() {
        $email = $this->input->post('Email');
        if($this->usuariosModel->verificarEmail($email) == 0){
            $nombre = $this->input->post('nombre');
            $grado = $this->input->post('Grado');
            $password = $this->input->post('Password');
            $ocupacion = $this->input->post('Ocupacion');
            $tipo = $this->input->post('tipocta');
            $e = 0;
            $m = 0;
            $p = 0;
            if($nombre !=null && $grado != null && $email != null && $password != null && $ocupacion != null && $tipo != null){
                $fecha = date('Y-m-d');
                switch ($ocupacion){
                    case 0:
                        break;
                    case 1:
                        $e = 1;
                        break;
                    case 2:
                        $m = 1;
                        break;
                    case 3:
                        $p = 1;
                        break;
                }
                $ready = $this->usuariosModel->registrar_usuario($nombre,$email,$password,$grado,$e,$m,$p,$fecha,$tipo);
                if($ready){
                    echo '1';
                }
                else{
                    echo '2';
                }
                
            }
        }
        else{
            echo '0';
        }
    }
    public function updateInfoPass() {
        if($this->session->userdata('logueado')){
            $id = $this->input->post('Id');
            $actual = $this->input->post('actual');
            $nueva = $this->input->post('nueva');
            if($id != null && $actual != null && $nueva != null){
                $ready = $this->usuariosModel->updateInfoPass($id,$actual,$nueva);
                if($ready){
                    $fecha = date('Y-m-d H:i:s');
                    $this->usuariosModel->log_registro("Change-Password",$this->session->userdata('nombre'),$fecha);
                    echo "true";
                }else{
                    echo "false";
                }

            }
        }else{
            redirect('/','refresh');
        }
    }
    public function updateInfo() {
        if($this->session->userdata('logueado')){
            $id = $this->input->post('Id');
            $grado = $this->input->post('Grado');
            $ocupacion = $this->input->post('Ocupacion');
            if($id != null && $grado != null && $ocupacion != null){
                $ready = $this->usuariosModel->updateInfoAdicional($id,$grado,$ocupacion);
                if($ready){
                    $e = 0;
                    $m = 0;
                    $p = 0;
                    switch ($ocupacion){
                        case 0:
                            break;
                        case 1:
                            $e = 1;
                            break;
                        case 2:
                            $m = 1;
                            break;
                        case 3:
                            $p = 1;
                            break;
                    }
                    $usuario_data = array(
                        'gradoestudios' => $grado,
                        'estudiante' => $e,
                        'maestro' => $m,
                        'padre' => $p
                     );
                     $this->session->set_userdata($usuario_data);
                }
            }
        }else{
            redirect('/','refresh');
        }
    }

    public function restaurarContrasena(){
        $data['inicio'] = '';
        $data['secuenciasdidacticas'] = '';
        $data['educacionyderechos'] = '';
        $data['promoradio'] = '';
        $data['audiocuentos'] = '';
        $data['canciones'] = '';
        $data['videos'] = '';
        $data['libros'] = '';
        $data['nosotros'] = '';
        $data['contacto'] = '';
        $this->load->view('inicio/reset',$data);
    }
    public function restablecer(){
        $iduser= $this->input->get('idusuario');
        $token = $this->input->get('token');
        $this->usuariosModel->updateReset($token);
        $data['inicio'] = '';
        $data['secuenciasdidacticas'] = '';
        $data['educacionyderechos'] = '';
        $data['promoradio'] = '';
        $data['audiocuentos'] = '';
        $data['canciones'] = '';
        $data['videos'] = '';
        $data['libros'] = '';
        $data['nosotros'] = '';
        $data['contacto'] = '';
        $sql = $this->usuariosModel->verificarToken($token);
        if($sql > 0){
            $usuario = $this->usuariosModel->verificarTokenReset($token);
            foreach ($usuario as $user) {
                    $id = $user->id;
                    $nombre = $user->username;
                    $idusuario = $user->idusuario;
                    $tk = $user->token;
                    $creado = $user->creado;
                }
            if(sha1($idusuario) == $iduser){
                $data['token'] = $token;
                $data['idusuario'] = $iduser;
                $this->load->view('inicio/restablecer',$data);
            }else{
                redirect('/','refresh');    
            }
        }else{
            redirect('/','refresh');   
        }
        
    }
    public function cambiarpassword(){
        $data['inicio'] = '';
        $data['secuenciasdidacticas'] = '';
        $data['educacionyderechos'] = '';
        $data['promoradio'] = '';
        $data['audiocuentos'] = '';
        $data['canciones'] = '';
        $data['videos'] = '';
        $data['libros'] = '';
        $data['nosotros'] = '';
        $data['contacto'] = '';
        $data['flag'] = "La contraseña se actualizó con exito.";
        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');
        $idusuario2 = $this->input->post('idusuario');
        $token = $this->input->post('token');
        $this->usuariosModel->updateReset($token);
        if( $password1 != "" && $password2 != "" && $idusuario2 != "" && $token != "" ){
            $sql = $this->usuariosModel->verificarToken($token);
            if($sql > 0){
                $usuario = $this->usuariosModel->verificarTokenReset($token);
                foreach ($usuario as $user) {
                        $id = $user->id;
                        $nombre = $user->username;
                        $idusuario = $user->idusuario;
                        $tk = $user->token;
                        $creado = $user->creado;
                    }
                if(sha1($idusuario) == $idusuario2){
                    if($password1 == $password2){
                           if($this->usuariosModel->updateInfoPassReset($idusuario,$password1)){
                                $this->usuariosModel->deleteResetToken($token);
                                $this->usuariosModel->deleteReset($token);
                           }else{
                                $data['flag'] = "Ocurrió un error al actualizar la contraseña, intentalo más tarde";
                           }
                    }else{
                        $data['flag'] = "Las contraseñas no coinciden";
                    }
                }else{
                    $data['flag'] = "El token no es válido";   
                } 
            }else{
                $data['flag'] = "El token no es válido";
            }
            $this->load->view('inicio/password',$data);
        }else{
            redirect('/','refresh');   
        }
    }

    
}
