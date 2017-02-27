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

class Admin extends CI_Controller 
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
    
    public function index()
    {
        $this->load->view('index_admin');
    }

    public function ver_productos()
    {
        $datos['productos']=$this->product_model->traer_productos();
        $this->load->view('product/productos_admin_view',$datos);
    }

    public function agregar_producto()
    {
        $this->load->view('product/agregar_producto_view');
    }

    public function crear_producto()
    {
        $producto=$this->input->post();
        $this->product_model->crear_producto($producto);
        redirect('/admin/ver_productos', 'refresh');
    }
    
    public function editar_campo_producto()
    {
        $campo=  $this->input->post('campo');
        $valor=  $this->input->post('valor');
        $referencia=  $this->input->post('referencia');
        $this->product_model->editar_campo_producto($referencia,$campo,$valor);
    }

    public function ver_empresas()
    {
        $datos['empresas']=$this->company_model->traer_empresas();
        $this->load->view('company/empresas_view',$datos);
    }
    
    public function ver_usuarios()
    {
        $datos['usuarios']=$this->user_model->traer_usuarios();
        $this->load->view('user/usuarios_view',$datos);
    }    

    public function ver_inventarios()
    {
        $datos['inventarios']=$this->inventory_model->traer_inventarios();
        $this->load->view('inventory/inventarios_view',$datos);
    }

    public function ver_pedidos()
    {
        $datos['pedidos']=$this->order_model->traer_pedidos();
        $this->load->view('order/pedidos_view',$datos);
    }

    public function ver_pedidos_solicitados()
    {        
        $datos['pedidos']=$this->order_model->traer_pedidos("1");
        $this->load->view('order/pedidos_solicitados_view',$datos);        
    }

    public function confirmar_pedido()
    {
        $pedido=$this->input->get('pedido');
        $this->order_model->actualizar_estado_pedido($pedido,'2');
        redirect('/admin/ver_pedidos_solicitados', 'refresh');
    }
    
    public function ver_pedidos_confirmados()
    {        
        $datos['pedidos']=$this->order_model->traer_pedidos("2");
        $this->load->view('order/pedidos_confirmados_view',$datos);        
    }

    public function entregar_pedido()
    {
        $pedido=$this->input->get('pedido');
        $this->order_model->actualizar_estado_pedido($pedido,'3');
        redirect('/admin/ver_pedidos_confirmados', 'refresh');        
    }
    
    public function ver_pedidos_entregados()
    {
        $datos['pedidos']=$this->order_model->traer_pedidos("3");
        $this->load->view('order/pedidos_view',$datos);       
    }
    
    public function ver_ventas()
    {
        $datos['ventas']=  $this->sales_model->traer_ventas();
        $this->load->view('sales/ver_ventas_view',$datos);        
    }
}