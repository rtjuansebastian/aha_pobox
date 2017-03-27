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
        $this->load->model('login_model');
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
        $datos['contactos']=$this->company_model->traer_contactos_empresas();
        $this->load->view('company/empresas_view',$datos);
    }
    
    public function agregar_empresa()
    {
        $this->load->view('company/agregar_empresas_view');
    }
    
    public function crear_empresa()
    {
        $empresa=  $this->input->post();
        $this->company_model->crear_empresa($empresa);
        redirect('/admin/ver_empresas', 'refresh');        
    }

    public function ver_usuarios()
    {
        $datos['usuarios']=$this->user_model->traer_usuarios();
        $this->load->view('user/usuarios_view',$datos);
    }    

    public function ver_inventarios()
    {
        $datos['inventarios']=$this->inventory_model->traer_inventarios();
        $datos['empresas']=$this->company_model->traer_empresas();
        $datos['productos']=$this->product_model->traer_productos();
        $this->load->view('inventory/inventarios_view',$datos);
    }
    
    public function filtrar_inventarios()
    {
        $empresa=null;
        $producto=null;
        if($this->input->post('empresa')!==''){$empresa=$this->input->post('empresa');}
        if($this->input->post('producto')!==''){$producto=$this->input->post('producto');}
        $datos['inventarios']=$this->inventory_model->traer_inventarios($empresa,$producto);
        $datos['empresas']=$this->company_model->traer_empresas();
        $datos['productos']=$this->product_model->traer_productos();
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
    
    public function procesar_pedido()
    {
        $pedido=$this->input->get('pedido');
        $this->order_model->actualizar_estado_pedido($pedido,'4');
        redirect('/admin/ver_pedidos_confirmados', 'refresh');        
    }
    
    public function ver_pedidos_en_proceso()
    {
        $datos['pedidos']=$this->order_model->traer_pedidos("4");
        $this->load->view('order/pedidos_en_proceso_view',$datos);       
    }    

    public function entregar_pedido()
    {
        $pedido=$this->input->get('pedido');
        $this->order_model->actualizar_estado_pedido($pedido,'3');
        redirect('/admin/ver_pedidos_en_proceso', 'refresh');        
    }
    
    public function ver_pedidos_entregados()
    {
        $datos['pedidos']=$this->order_model->traer_pedidos("3");
        $this->load->view('order/pedidos_view',$datos);       
    }
    
    public function crear_pedido()
    {
        $datos['productos']=$this->product_model->traer_productos();
        $datos['empresas']=$this->company_model->traer_empresas();
        $this->load->view('order/hacer_pedido_admin_view',$datos); 
    }
    
    public function registrar_pedido_admin()
    {
        $fecha=  $this->input->post("fecha");
        $empresa=  $this->input->post("empresa");
        $items=$this->order_model->items_pedido();
        $this->order_model->registrar_pedido($fecha,$empresa,$items,'2');        
        redirect('/admin/ver_pedidos_confirmados', 'refresh');
    }

    public function ver_ventas()
    {
        $datos['empresas']=  $this->company_model->traer_empresas();
        $datos['ventas']=  $this->sales_model->traer_ventas();
        $this->load->view('sales/ver_ventas_view',$datos);        
    }
    
    public function filtrar_ventas()
    {
        $empresa=null;
        $producto=null;
        if($this->input->post('empresa')!==''){$empresa=$this->input->post('empresa');}
        if($this->input->post('producto')!==''){$producto=$this->input->post('producto');}
        $rango=$this->input->post('daterange');
        $fecha=  explode("/", $rango);
        $ventas=$this->sales_model->traer_ventas($empresa,$producto,trim($fecha[0]),trim($fecha[1]));               
        echo json_encode($ventas);
    } 
    
    public function agregar_usuario()
    {
        $datos['empresas']=$this->company_model->traer_empresas();
        $this->load->view('user/agregar_usuario_view',$datos);  
    }
    
    public function crear_usuario()
    {
        $usuario=$this->input->post();
        $usuario['password']=$this->login_model->get_hash($usuario['password']);
        $this->user_model->crear_usuario($usuario);
        redirect('/admin/ver_usuarios', 'refresh');
    }
}