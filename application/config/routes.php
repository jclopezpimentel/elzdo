<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'inicio';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route["Nosotros"] = "Nosotros";
//ORLANDO'S ROUTES
$route['contacto'] = 'Contacto';
$route['sendQuestion'] = 'Contacto/sendQuestion';
$route['audiocuentosGrado'] = 'AudioCuentos';
$route['AudioAdmin'] = 'AudioCuentos/admin';
$route['uploadAudio'] = 'AudioCuentos/uploadAudio';
$route['deleteAudios'] = 'AudioCuentos/deleteAudio';




//mauricio
$route['Bienvenida']='bienvenida';
$route['admiSD']='bienvenida/admiSD';
$route['subir'] = 'bienvenida/subir';
$route['deleteSD'] ="bienvenida/deleteSD";
$route['deleteSDbyId'] ="bienvenida/deleteSdById";
$route['getSecuencia'] = "bienvenida/getSecuenciaById";

$route['newGrado'] = "bienvenida/newGrado";
//salgasy

$route['videos'] = 'videos';
$route['admivideos'] = 'Admivideos';
$route['uploadvideos'] = 'Admivideos/loadAdvideo';
$route['newvalor']= 'Admivideos/newVideo';
$route['newCategoria'] = 'Admivideos/newCategoria';
$route['deleteVideos']= 'Admivideos/deleteVideos';
$route['delV'] = 'Admivideos/deleteVideo';
$route['urlSearch'] = "videos/urlsearch";
$route['searchValor'] = "videos/valosearch";

$route['promoRadio'] ="PromoRadio";
$route['AdmipromoRadio'] = 'AdmipromoRadio';
$route['AddPodcats'] = 'PromoRadio/AddPodcats';
$route['deletePodcast'] = 'AdmipromoRadio/deletePodcast';
$route['deletePodcastById'] = 'AdmipromoRadio/deletepodcastlist';


//walter S
$route['adminLibro'] ='AdminLibro';
$route['saveLibros']="AdminLibro/saveLibro";
$route['deleteLibro']="AdminLibro/deleteBook";
$route['cosulLibros']="AdminLibro/consul";
$route['deleteLibros']="AdminLibro/delete";
$route['revista'] = 'libro';
$route['searchLibros'] = 'libro/filter'; 

//WALTER F

$route['Admin_educationyderechos'] = 'Admin_educationyderechos';
$route['updateforoeyd'] = 'Admin_educationyderechos/loadeyd';
$route['Admin_educationyderechos_eliminar'] = 'Admin_educationyderechos/deleteEyD';
$route['deleteforoeyd'] = 'Admin_educationyderechos/unlink';

$route['educacionyderechos'] = 'educacionyderechos';

//david

$route['Canciones'] = 'canciones';
$route['AdminDisco'] = 'canciones/AdminDisco';
$route['borrarDisco'] = 'canciones/AdminDeleteDisco';
$route['crearDisco'] = 'canciones/subir_disco';
$route['agregarDisco'] = 'canciones/agregar';
$route['subircancion'] = 'canciones/subircancion';
$route['borraDisco'] = 'canciones/delete_disco';
$route['getDisco/(:num)'] = 'canciones/getDisco/$1';
$route['getDiscoGrado'] = 'canciones/getDiscoGrado';
$route['borrarCancion'] = 'canciones/borrarCancion';


$route['login'] = 'inicio/login_user';
$route['logout'] = 'inicio/cerrar_sesion';
$route['registro'] = 'inicio/registro';
$route['registrar'] = 'inicio/registrar';
$route['updateInfo'] = 'inicio/updateInfo';
$route['updateInfoPass'] = 'inicio/updateInfoPass';

$route['reset'] = 'inicio/restaurarContrasena';
$route['validaemail'] = 'contacto/validaemail';
$route['restablecer'] = 'inicio/restablecer';
$route['cambiarpassword'] = 'inicio/cambiarpassword';


// admin
$route['resetAdmin'] = 'administrador/reset';
$route['validaemailAdmin'] = 'contacto/validaemailAdmin';
$route['restaurar'] = 'administrador/restaurar';
$route['cambiarpasswordadmin'] = 'administrador/cambiarpasswordadmin';
//admin
$route['adminPanel'] = "Admin_panel";
$route['adminGral'] = "Admin_panel/adminGral";
$route['Panel'] = 'administrador';
$route['AdminLogin'] = 'administrador/login';
$route['AdminLogout'] = 'administrador/logout';
$route['crearAdmin'] = "administrador/crearAdmin";
$route['registrarAdmin'] = "administrador/registrar";
$route['deleteAdmin'] = "administrador/deleteAdm";
$route['getInfoAdmin'] = "administrador/getInfo";
$route['deleteAdm'] = "administrador/deleteAdmById";


$route['adminInfo'] = "Admin_panel/adminInfo";
$route['getInfoAdmin'] = "Admin_panel/getInfoAdmin";
$route['updateInfo1'] = "Admin_panel/updateInfo";
/* historial */
$route['historial'] = "administrador/historial";
$route['historialAdmin'] = "historial";
$route['getHistorial'] = "historial/getHistorial";

$route['privilegios'] = "Admin_panel/privilegios";
$route['getPrivilegios'] = "Admin_panel/getPrivilegios";
$route['updatePrivilegios'] = "Admin_panel/updateP";


/*editar*/
$route['editaSD'] = "bienvenida/editar";
$route['editarSecuencia'] = "bienvenida/edit";

$route['editaED'] = "Admin_educationyderechos/editar";
$route['editarDerechos'] = "Admin_educationyderechos/edit";

$route['editaPodcast'] = "AdmipromoRadio/editar";
$route['editarPodcasts'] = "AdmipromoRadio/edit";

$route['editaCuentos'] = "AudioCuentos/editar";
$route['editarAudio'] = "AudioCuentos/edit";

$route['editaDisco'] = "canciones/editar";
$route['editarDiscos'] = "canciones/edit";

$route['editaVideo'] = "Admivideos/editar";
$route['editarVideos'] = "Admivideos/edit";

$route['editaLibro'] = "AdminLibro/editar";
$route['editarLibros'] = "AdminLibro/edit";

/*editar*/
$route['getSecuenciaGrado'] = 'bienvenida/getSecuenciaGrado';
//compartir canciones
$route['Cancion'] = 'canciones/Cancion';

//compartir podcast
$route['podcasts'] = 'PromoRadio/podcast';

//compartir secuencias
$route['secuencia'] = "bienvenida/secuencia";

//compartit audiocuentos
$route['cuentos'] = "AudioCuentos/cuentos";