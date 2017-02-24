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

class Inventory extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventory_model');
        $this->load->model('user_model');
        $this->load->model('company_model');
    }
    
    public function ver_inventarios()
    {
        $datos['inventarios']=$this->inventory_model->traer_inventarios();
        $this->load->view('inventory/inventarios_view',$datos);
    }
    
    public function ver_inventario()
    {
        $usuario=$this->session->userdata('sesion'); 
        $datos['usuario']=$this->user_model->traer_usuario($usuario['cedula']);       
        $datos['inventario']=$this->inventory_model->traer_inventario($datos['usuario']['empresa']);
        $this->load->view('inventory/ver_inventario_empresa_view',$datos);
    }    
}