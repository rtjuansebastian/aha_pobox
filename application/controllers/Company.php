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

class Company extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('company_model');
    }
        
    public function ver_empresa()
    {
        $usuario=$this->session->userdata('sesion'); 
        $datos['usuario']=$this->user_model->traer_usuario($usuario['cedula']);
        $datos['empresa']=$this->company_model->traer_empresa($datos['usuario']['empresa']);
        $this->load->view('company/ver_empresa_usuario_view',$datos);
    }
}