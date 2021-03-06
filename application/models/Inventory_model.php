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
class Inventory_model extends CI_Model 
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
    
    public function traer_inventarios($empresa=NULL,$producto=NULL,$fecha_inicial=NULL,$fecha_final=NULL)
    {
        $inventarios=array();
        $this->db->select('razon_social, referencia, titulo, SUM(CASE ingreso_salida WHEN "I" THEN cantidad WHEN "S" THEN -cantidad END) as cantidad');
        $this->db->from('inventarios');
        $this->db->join('empresas','inventarios.empresa=empresas.id');
        $this->db->join('productos','inventarios.producto=productos.referencia');
        if($empresa){$this->db->where('empresa',$empresa);}
        if($producto){$this->db->where('producto',$producto);}
        if($fecha_inicial && $fecha_final){$this->db->where('fecha >=',$fecha_inicial); $this->db->where('fecha <=',$fecha_final);}
        $this->db->group_by("empresa, producto");
        $this->db->order_by("empresa, producto");
        $query=$this->db->get();
        if($query->num_rows()>0)
        {
            $i=0;
            foreach ($query->result() as $row)
            {
                $inventarios[$i]['empresa']=$row->razon_social;
                $inventarios[$i]['referencia']=$row->referencia;
                $inventarios[$i]['titulo']=$row->titulo;
                $inventarios[$i]['cantidad']=$row->cantidad;
                $i++;
            }
        }
        
        return $inventarios;       
    }
    
    public function traer_inventario($empresa,$producto=NULL,$fecha_inicial=NULL,$fecha_final=NULL)
    {
        $inventario=array();
        $this->db->select('referencia, titulo, SUM(CASE ingreso_salida WHEN "I" THEN cantidad WHEN "S" THEN -cantidad END) as cantidad');
        $this->db->join('productos','inventarios.producto=productos.referencia');
        $this->db->where('empresa',$empresa);        
        if($fecha_inicial && $fecha_final){$this->db->where('fecha >=',$fecha_inicial); $this->db->where('fecha <=',$fecha_final);}        
        if($producto){$this->db->where('producto',$producto);}
        else{$this->db->group_by("producto");}        
        $this->db->order_by("producto");
        $query=$this->db->get('inventarios');
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $inventario[$row->referencia]['referencia']=$row->referencia;
                $inventario[$row->referencia]['titulo']=$row->titulo;
                $inventario[$row->referencia]['cantidad']=$row->cantidad;                
            }
        }
        
        return $inventario;        
    }    
}