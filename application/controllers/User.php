<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador de los usuarios de la aplicación
 * 
 * Este controlador conecta las funciones del modelo y las 
 * vistas de los usuarios.
 * 
 * @package AHA
 * @autor Juan Sebastián Rodríguez <rtjuansebastian@gmail.com>
 * @version 1.0
 * @copyright PoBox
 */

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }    
    
    public function ver_perfil()
    {
        $usuario=$this->session->userdata('sesion'); 
        $datos['usuario']=$this->user_model->traer_usuario($usuario['cedula']);
        $this->load->view('user/ver_perfil_usuario_view',$datos);
    }
    
    public function editar_campo_usuario()
    {
        $usuario=$this->session->userdata('sesion');
        $campo= $this->input->post('campo');
        $valor= $this->input->post('valor');
        $this->user_model->editar_campo_usuario($usuario['cedula'],$campo,$valor);
    }
    
    public function cambiar_contrasena()
    {
        if($this->input->post())
        {
            $anterior=  $this->input->post('anterior');
            $nueva=  $this->input->post('nueva');
            $cedula= $this->input->post('cedula');
            $datos['resultado']=$this->user_model->cambiar_contrasena($cedula,$anterior,$nueva);
            $usuario=$this->session->userdata('sesion');             
            $datos['usuario']=$this->user_model->traer_usuario($usuario['cedula']);                        
            $this->load->view('user/cambiar_contrasena_view',$datos);
        }
        else 
        {
            $usuario=$this->session->userdata('sesion'); 
            $datos['usuario']=$this->user_model->traer_usuario($usuario['cedula']);        
            $this->load->view('user/cambiar_contrasena_view',$datos);
        }
    }
    
    public function ver_usuario()
    {
        $usuario=  $this->input->get("usuario");
        $datos['usuario']=$this->user_model->traer_usuario($usuario);
        $datos['header']="header";
        $this->load->view('user/ver_usuario_view',$datos);
    }
}