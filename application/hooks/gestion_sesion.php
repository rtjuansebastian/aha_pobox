<?php
class Gestion_sesion{
   function index(){
    //instanciamos al objeto codeigniter
      $CI =& get_instance();       
      
      // cargamos la libreria de sesion
      $CI->load->library('session');
      $sesion = $CI->session->userdata('sesion');      
      // obtenemos el nombre del controlador en el que estamos
      $controlador = $CI->router->class;
            
      if ($sesion== false && $CI->uri->segment(1) != 'login' )
      {
            redirect(base_url('login'));
      }
      elseif($sesion['rol']=='2' && $controlador=='admin')
      {
          redirect(base_url('index'));
      }
   }
}