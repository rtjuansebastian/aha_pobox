<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Modelo del login de la aplicación
 * 
 * Este modelo realiza las consultas sobre los usuarios a la base de datos
 * y retorna los resultados al controlador.
 * 
 * @package AHA
 * @autor Juan Sebastián Rodríguez <rtjuansebastian@gmail.com>
 * @version 1.0
 * @copyright PoBox
 */
class Product_model extends CI_Model 
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
    
    public function traer_productos()
    {
        $productos=array();
        $query=$this->db->get('productos');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $productos[$row->referencia]['referencia']=$row->referencia;
                $productos[$row->referencia]['titulo']=$row->titulo;
                $productos[$row->referencia]['version']=$row->version;
            }
        }
        
        return $productos;
    }
    
    public function traer_producto($referencia)
    {
        $producto=array();
        $this->db->where('referencia',$referencia);
        $query=$this->db->get('productos');
        if($query->num_rows()>0)
        {
            $row=$query->row();
            $producto['referencia']=$row->referencia;
            $producto['titulo']=$row->titulo;
            $producto['version']=$row->version;
        }
        
        return $producto;
    }   
    
    public function crear_producto($producto)
    {        
        $this->db->insert('productos', $producto); 
    }
    
    public function editar_campo_producto($referencia,$campo,$valor)
    {
        $data = array(
                       $campo => $valor
                    );

        $this->db->where('referencia', $referencia);
        $this->db->update('productos', $data);         
    }
}