<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Modelo del usuario de la aplicación
 * 
 * Este modelo realiza las consultas sobre los usuarios a la base de datos
 * y retorna los resultados al controlador.
 * 
 * @package AHA
 * @autor Juan Sebastián Rodríguez <rtjuansebastian@gmail.com>
 * @version 1.0
 * @copyright PoBox
 */
class Order_model extends CI_Model 
{
    
    /**
     * Constructor de la clase 
     * 
     * Metodo que carga los atributos de la clase CI_model
     */    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function traer_pedidos()
    {
        $pedidos=array();
        $this->db->select('numero_pedido, fecha, razon_social, pedidos_estados.estado');
        $this->db->from('pedidos');
        $this->db->join('pedidos_estados','pedidos.estado=pedidos_estados.id');
        $this->db->join('empresas','pedidos.empresa=empresas.id');
        $query=$this->db->get();
        
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $pedidos[$row->numero_pedido]['numero_pedido']=$row->numero_pedido;
                $pedidos[$row->numero_pedido]['empresa']=$row->razon_social;
                $pedidos[$row->numero_pedido]['fecha']=$row->fecha;
                $pedidos[$row->numero_pedido]['estado']=$row->estado;
                $pedidos[$row->numero_pedido]['productos']=$this->order_model->traer_productos_pedido($row->numero_pedido);
            }
        }
        
        return $pedidos;
    }
    
    public function traer_pedidos_empresa($empresa)
    {
        $pedidos=array();
        $this->db->select('numero_pedido, fecha, pedidos_estados.estado');
        $this->db->from('pedidos');
        $this->db->join('pedidos_estados','pedidos.estado=pedidos_estados.id');
        $this->db->where('empresa',$empresa);
        $query=$this->db->get();
        
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $pedidos[$row->numero_pedido]['numero_pedido']=$row->numero_pedido;
                $pedidos[$row->numero_pedido]['fecha']=$row->fecha;
                $pedidos[$row->numero_pedido]['estado']=$row->estado;
                $pedidos[$row->numero_pedido]['productos']=$this->order_model->traer_productos_pedido($row->numero_pedido);
            }
        }
        
        return $pedidos;        
    }


    public function traer_productos_pedido($numero_pedido)
    {
        $productos=array();
        $this->db->select("pedido, producto, titulo, cantidad");
        $this->db->from('pedidos_productos');
        $this->db->join('productos','pedidos_productos.producto=productos.referencia');
        $this->db->where('pedido',$numero_pedido);
        $query=$this->db->get();
        
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $productos[$row->producto]['pedido']=$row->pedido;
                $productos[$row->producto]['referencia']=$row->producto;
                $productos[$row->producto]['titulo']=$row->titulo;
                $productos[$row->producto]['cantidad']=$row->cantidad;
            }
        }
        
        return $productos;
    }
    
    public function agregar_producto($referencia,$cantidad,$titulo)
    {
        $data = array(
                'id'      => $referencia,
                'qty'     => $cantidad,
                'price'   => $cantidad,
                'name'    => $titulo
        );

        $this->cart->insert($data);        
    }
    
    public function quitar_producto($rowid)
    {
        $this->cart-> remove($rowid);
    }

    public function items_pedido()
    {
        $datos['items']=array();
        
        foreach ($this->cart->contents() as $items)
        {            
            $datos['items'][]=$items;
        }
        
        $datos['total']=$this->cart->total_items();
        
        return $datos;        
    }
    
    public function registrar_pedido($fecha,$empresa,$items)
    {
        $data = array(
           'fecha' => $fecha ,
           'empresa' => $empresa ,
           'estado' => '1'
        );

        $this->db->insert('pedidos', $data);
        
        $pedido=  $this->db->insert_id();
        
        foreach ($items['items'] as $producto)
        {
            $data = array(
               'pedido' => $pedido ,
               'producto' => $producto['id'] ,
               'cantidad' => $producto['qty']
            );

            $this->db->insert('pedidos_productos', $data);            
        }
        
        $this->cart->destroy();
    }
}