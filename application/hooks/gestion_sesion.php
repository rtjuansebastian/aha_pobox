<?php
class Gestion_sesion{
   function index(){
    //instanciamos al objeto codeigniter
      $CI =& get_instance();       
      
      // cargamos la libreria de sesion
      $CI->load->library('session');
      $sesion = $CI->session->userdata('sesion');      
      
      if ($sesion== false && $CI->uri->segment(1) != 'login' )
      {
            redirect(base_url('login'));
      }
   }
}