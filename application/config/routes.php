<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "login/login"; /*welcome*/
$route['404_override'] = '';

$route['login'] = 'login/login';
$route['area_restrita'] = 'login/area_restrita/main_page/';
$route['area_restrita/main_page/'] = 'login/area_restrita/';
$route['area_restrita/main_page/(:any)'] = 'login/area_restrita/main_page/$i';

$route['novo_documento'] = 'login/novo_documento';
$route['novo_documento/cadastrarProtocolo'] = 'login/novo_documento/cadastrarProtocolo';
$route['continuar_documento'] = 'login/continuando_documento';
$route['continuar_documento/(:any)'] = "login/continuando_documento/$1";
$route['continuar_documento/Endereco/(:any)'] = 'login/continuando_documento/Endereco/$1';

$route['atualizar_documento'] = 'login/atualizar_documento';
$route['pesquisar_documento'] = 'login/pesquisar_documento';
$route['detalhes_documento/(:any)'] = "login/detalhes_documento/$1";

$route['pesquisa_avancada'] = "pesquisa/pesquisa_avancada";

$route['logout'] = 'login/login/logout';
$route['about'] = 'pages/view/about';
$route['home'] = 'pages/view/home';

$route['pages'] = 'pages';
//$route['(:any)'] = 'pages/view/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */