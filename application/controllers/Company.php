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
        $datos['usuarios']=$this->company_model->traer_usuarios_empresa($datos['usuario']['empresa']);        
        $datos['empresa']=$this->company_model->traer_empresa($datos['usuario']['empresa']);
        $datos['contacto']=$this->user_model->traer_usuario($datos['empresa']['contacto']);        
        $this->load->view('company/ver_empresa_usuario_view',$datos);
    }
    
    public function editar_campo_empresa()
    {
        $campo=  $this->input->post('campo');
        $valor=  $this->input->post('valor');
        $usuario=$this->session->userdata('sesion'); 
        $datos['usuario']=$this->user_model->traer_usuario($usuario['cedula']);
        $this->company_model->editar_campo_empresa($datos['usuario']['empresa'],$campo,$valor);
    }
    
    public function cambiar_contacto_empresa()
    {
        $contacto=  $this->input->post("contacto");
        $empresa=  $this->input->post("id");
        $this->company_model->cambiar_contacto_empresa($empresa,$contacto);
        redirect('/company/ver_empresa', 'refresh');
    }
}