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
    
    public function ver_promedio_ventas_empresa()
    {
        $usuario=$this->session->userdata('sesion'); 
        $datos['usuario']=$this->user_model->traer_usuario($usuario['cedula']);        
        $datos['promedios']=$this->sales_model->traer_promedio_ventas_empresa($datos['usuario']['empresa']);
        $datos['inventario']=$this->inventory_model->traer_inventario($datos['usuario']['empresa']);
        $datos['catalogo']=$this->sales_model->traer_catalogo($datos['usuario']['empresa']);
        $this->load->view('sales/ver_promedio_ventas_empresa_view',$datos);
    }
    
    public function filtrar_ventas()
    {
        $usuario=$this->session->userdata('sesion'); 
        $datos['usuario']=$this->user_model->traer_usuario($usuario['cedula']);               
        $producto=null;
        if($this->input->post('producto')!==''){$producto=$this->input->post('producto');}
        $rango=$this->input->post('daterange');
        $fecha=  explode("/", $rango);
        $ventas=  $this->sales_model->traer_ventas_empresa($datos['usuario']['empresa'],$producto,$fecha[0],$fecha[1]);
        echo json_encode($ventas);
    }
}