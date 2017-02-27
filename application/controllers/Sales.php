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

class Sales extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('product_model');
        $this->load->model('company_model');
        $this->load->model('order_model');
        $this->load->model('sales_model');
        $this->load->model('inventory_model');
    }
    
    public function ver_ventas_empresa()
    {
        $usuario=$this->session->userdata('sesion'); 
        $datos['usuario']=$this->user_model->traer_usuario($usuario['cedula']);  
        $datos['ventas']=  $this->sales_model->traer_ventas_empresa($datos['usuario']['empresa']);
        $this->load->view('sales/ver_ventas_empresas_view',$datos);
    }
    
    public function hacer_venta()
    {
        $usuario=$this->session->userdata('sesion'); 
        $datos['usuario']=$this->user_model->traer_usuario($usuario['cedula']);       
        $datos['inventario']=$this->inventory_model->traer_inventario($datos['usuario']['empresa']);        
        $this->load->view('sales/hacer_venta_view',$datos);
    }

    public function registrar_venta()
    {
        $fecha=  $this->input->post('fecha');
        $usuario=$this->session->userdata('sesion'); 
        $datos['usuario']=$this->user_model->traer_usuario($usuario['cedula']);        
        $items=$this->order_model->items_pedido();
        $this->sales_model->registrar_venta($fecha,$datos['usuario']['empresa'],$items);
        redirect('/sales/ver_ventas_empresa', 'refresh');        
    }
}