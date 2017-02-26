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

class Order extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('product_model');
        $this->load->model('company_model');
        $this->load->model('order_model');
    }
    
    public function ver_pedidos()
    {
        $datos['pedidos']=$this->order_model->traer_pedidos();
        $this->load->view('order/pedidos_view',$datos);
    }
    
    public function ver_pedidos_empresa()
    {
        $usuario=$this->session->userdata('sesion'); 
        $datos['usuario']=$this->user_model->traer_usuario($usuario['cedula']);         
        $datos['pedidos']=$this->order_model->traer_pedidos_empresa($datos['usuario']['empresa']);
        $this->load->view('order/ver_pedidos_empresa_view',$datos);
    }

    public function hacer_pedido()
    {
        $datos['productos']=$this->product_model->traer_productos();
        $this->load->view('order/hacer_pedido_view',$datos);
    }
    
    public function agregar_producto()
    {
        $referencia=$this->input->post("referencia");
        $cantidad=$this->input->post("cantidad");
        $producto=$this->product_model->traer_producto($referencia);
        $titulo= substr($producto['titulo'],0,14);
        $this->order_model->agregar_producto($referencia,$cantidad,$titulo);                
        
        $items=$this->order_model->items_pedido();
        echo json_encode($items);
    }
    
    public function quitar_producto()
    {
        $rowid=  $this->input->post("rowid");
        $this->order_model->quitar_producto($rowid);        
        $items=$this->order_model->items_pedido();
        echo json_encode($items);        
    }
    
    public function registrar_pedido()
    {
        $fecha=$this->input->post('fecha');
        $usuario=$this->session->userdata('sesion'); 
        $datos['usuario']=$this->user_model->traer_usuario($usuario['cedula']);        
        $items=$this->order_model->items_pedido();
        $this->order_model->registrar_pedido($fecha,$datos['usuario']['empresa'],$items);
        $this->ver_pedidos_empresa();
    }
}