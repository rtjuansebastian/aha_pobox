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
    
    public function ver_usuarios()
    {
        $datos['usuarios']=$this->user_model->traer_usuarios();
        $this->load->view('user/usuarios_view',$datos);
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
}