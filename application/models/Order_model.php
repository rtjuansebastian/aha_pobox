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
    
    public function traer_pedidos($estado=NULL)
    {
        $pedidos=array();
        $this->db->select('numero_pedido, fecha, razon_social, pedidos_estados.estado');
        $this->db->from('pedidos');
        $this->db->join('pedidos_estados','pedidos.estado=pedidos_estados.id');
        $this->db->join('empresas','pedidos.empresa=empresas.id');
        if($estado)
        {
            $this->db->where('pedidos.estado',$estado);
        }           
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
    
    public function traer_pedidos_empresa($empresa,$estado=NULL)
    {
        $pedidos=array();
        $this->db->select('numero_pedido, fecha, pedidos_estados.estado');
        $this->db->from('pedidos');
        $this->db->join('pedidos_estados','pedidos.estado=pedidos_estados.id');
        $this->db->where('empresa',$empresa);
        if($estado)
        {
            $this->db->where('pedidos.estado',$estado);
        }        
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
    
    public function registrar_pedido($fecha,$empresa,$items,$estado=1)
    {
        $data = array(
           'fecha' => $fecha ,
           'empresa' => $empresa ,
           'estado' => $estado
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
    
    public function actualizar_estado_pedido($pedido,$estado)
    {
        $data = array(
                      'estado' => $estado
                   );

       $this->db->where('numero_pedido', $pedido);
       $this->db->update('pedidos', $data);    
       
       if($estado=='3')
       {
           $this->order_model->ingresar_pedido_inventario($pedido);
       }
    }
    
    public function ingresar_pedido_inventario($pedido)
    {
        $this->db->select('pedidos.empresa, pedidos_productos.producto, pedidos_productos.cantidad');
        $this->db->from('pedidos_productos');
        $this->db->join('pedidos','pedidos_productos.pedido=pedidos.numero_pedido');
        $this->db->where('pedido',$pedido);
        $query=$this->db->get();
        
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $data = array(
                   'empresa' => $row->empresa ,
                   'producto' => $row->producto ,
                   'cantidad' => $row->cantidad,
                   'fecha'  => date('Y-m-d'),
                   'ingreso_salida'  => 'I'
                );

                $this->db->insert('inventarios', $data);                 
            }
        }
    }
    
    public function crear_proyeccion($proyeccion)
    {
        $this->cart->destroy();
        foreach ($proyeccion as $producto)
        {
            if($producto['proyeccion']<0)
            {                
                $cantidad=round($producto['proyeccion']*(-1));
                $titulo= substr($producto['titulo'],0,14);
                $this->order_model->agregar_producto($producto['referencia'],$cantidad,$titulo);
            }
        }
                
    }

}