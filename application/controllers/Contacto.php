<?php
    ini_set("SMTP","localhost");
    ini_set("smtp_port",25);
    ini_set("sendmail_from","orbaher7@gmail.com");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contacto
 *
 * @author ORLANDO ALEXIS
 */
class Contacto extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('usuariosModel');
        $this->load->library('session');
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
        $data['nosotros'] = '';
        $data['contacto'] = 'active';
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
            $this->load->view("Contacto/contacto",$data);
        }else{
            $this->load->view("Contacto/contacto",$data);
        }
    }
    
    public function sendQuestion(){
        $data['login'] = false;
        $data['inicio'] = '';
        $data['secuenciasdidacticas'] = '';
        $data['educacionyderechos'] = '';
        $data['promoradio'] = '';
        $data['audiocuentos'] = '';
        $data['canciones'] = '';
        $data['videos'] = '';
        $data['libros'] = '';
        $data['nosotros'] = '';
        $data['contacto'] = 'active';
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        
        $para="arcoscruzdavid@gmail.com";
	$titulo="Comentario desde la Pagina";

	

	$cabecera="From: " .$name. "<" .$email. ">" ."\r\n".
				"Reply-To:".$email."\r\n".
				"X-Mailer:PHP/ ".phpversion();


	$mensaje="Nombre: ".$name."\n".
                "Teléfono:".$subject."\n\n".
		"Correo:".$email."\n".
		"Comentario:".$message;
	if(mail($para, $titulo, utf8_decode($message), $cabecera))
	{
		echo("<script>alert('Su mensaje ha sido enviado');</script>");
                
		
	}else{
		echo("Error. Porfavor intente más tarde...");
	}
        $data['login'] = false;
        if($this->session->userdata('logueado')){
            $data['login'] = $this->session->userdata('logueado');
            $this->load->view("Contacto/contacto",$data);
        }else{
            $this->load->view("Contacto/contacto",$data);
        }
        

    }
    public function validaemail(){
        $email = $this->input->post('email');
        $respuesta = new stdClass();
        if($email != ""){
            $resultado = $this->usuariosModel->verificarEmail($email);
            if($resultado > 0){
                $usuario = $this->usuariosModel->verificarEmailReset($email);
                foreach ($usuario as $user) {
                    $nombre = $user->nombre;
                    $id = $user->id;
                    $tipo = $user->tipoCta;
                }
                if($tipo == 0){
                    $LinkTemporal = $this->generarLinkTemporal($id,$nombre);
                    if($LinkTemporal){
                        $this->enviarEmail($email,$LinkTemporal);
                        $respuesta->mensaje = '<div class="alert alert-info"> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña, el correo se puede demorar algunos minutos.</div>';
                        
                        
                    }else{
                        $respuesta->mensaje = 'error';
                    }

                }else{
                    $respuesta->mensaje = '<div class="alert alert-info">Este correo <strong>'.$email.'</strong> esta registrado por medio de Facebook, no podemos restablecer su contraseña. </div>'; 
                }
                   
            }else{
                $respuesta->mensaje = '<div class="alert alert-info">No existe una cuenta asociada a ese correo <strong>'.$email.'</strong></div>';
            }
        }else{
            $respuesta->mensaje = '<div class="alert alert-info">Debes introducir el email de la cuenta</div>';
            
        }
        echo json_encode($respuesta);
    }
    function generarLinkTemporal($idusuario, $username){
    // Se genera una cadena para validar el cambio de contraseña
        $cadena = $idusuario.$username.rand(1,9999999).date('Y-m-d');
        $token = sha1($cadena);
        // Se inserta el registro en la tabla tblreseteopass
        $this->usuariosModel->resetpassToken($token);
        $sql = $this->usuariosModel->resetpass($idusuario,$username,$token,date('Y-m-d H:i:s'));
        if($sql){
        // Se devuelve el link que se enviara al usuario
            $enlace = base_url().'restaurar?idusuario='.sha1($idusuario).'&token='.$token;
            return $enlace;
        }
        else{
            return FALSE;
        }
        //return FALSE;
    }
    function enviarEmail($email,$link){
       $mensaje = '<html>
     <head>
        <title>Restablece tu Password</title>
     </head>
     <body>
       <p>Hemos recibido una petición para restablecer el Password de tu cuenta.</p>
       <p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
       <p>
         <strong>Enlace para restablecer tu Password</strong><br>
         <a href="'.$link.'"> Restablecer Password </a>
       </p>
     </body>
    </html>';
 
   $cabeceras = 'MIME-Version: 1.0' . "\r\n";
   $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $cabeceras .= 'From: En los zapatos del otro <enloszapatosdelotro@gmail.com>' . "\r\n";
   $cabeceras .= 'Cc: '.$email . "\r\n";
    $cabeceras .= 'Bcc: '.$email."\r\n";
   // Se envia el correo al usuario
   mail($email,"Recuperar Password", $mensaje, $cabeceras);
    }

    function enviarEmailAdmin($email,$link){
       $mensaje = '<html>
     <head>
        <title>Restablece tu Password</title>
     </head>
     <body>
       <p>Hemos recibido una petición para restablecer el Password de tu cuenta de Administrador.</p>
       <p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
       <p>
         <strong>Enlace para restablecer tu Password</strong><br>
         <a href="'.$link.'"> Restablecer Password </a>
       </p>
     </body>
    </html>';
 
   $cabeceras = 'MIME-Version: 1.0' . "\r\n";
   $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $cabeceras .= 'From: En los zapatos del otro <enloszapatosdelotro@gmail.com>' . "\r\n";
   $cabeceras .= 'Cc: '.$email . "\r\n";
    $cabeceras .= 'Bcc: '.$email."\r\n";
   // Se envia el correo al usuario
   mail($email,"Recuperar Password", $mensaje, $cabeceras);
    }


    public function validaemailAdmin(){
        $email = $this->input->post('email');
        $respuesta = new stdClass();
        if($email != ""){
            $resultado = $this->usuariosModel->verificarEmailAdmin($email);
            if($resultado > 0){
                $usuario = $this->usuariosModel->verificarEmailResetAdmin($email);
                foreach ($usuario as $user) {
                    $nombre = $user->nombre;
                    $id = $user->id;
                }
                    $LinkTemporal = $this->generarLinkTemporal($id,$nombre);
                    if($LinkTemporal){
                        $this->enviarEmailAdmin($email,$LinkTemporal);
                        $respuesta->mensaje = '<div class="alert alert-info"> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña, el correo se puede demorar algunos minutos.</div>';
                        
                        
                    }else{
                        $respuesta->mensaje = 'error';
                    }
                   
            }else{
                $respuesta->mensaje = '<div class="alert alert-info">No existe una cuenta asociada a ese correo <strong>'.$email.'</strong></div>';
            }
        }else{
            $respuesta->mensaje = '<div class="alert alert-info">Debes introducir el email de la cuenta</div>';
            
        }
        echo json_encode($respuesta);
    }
}
