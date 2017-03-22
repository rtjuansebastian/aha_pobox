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
class Sales_model extends CI_Model 
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
    
    public function traer_ventas()
    {
        $ventas=array();
        $this->db->select("inventarios.id, inventarios.empresa, empresas.razon_social, inventarios.producto, productos.titulo, inventarios.cantidad, inventarios.fecha");
        $this->db->from('inventarios');
        $this->db->join('productos',"inventarios.producto=productos.referencia");        
        $this->db->join('empresas',"inventarios.empresa=empresas.id");    
        $query= $this->db->get();
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $ventas[$row->empresa][$row->id]['empresa']=$row->razon_social;
                $ventas[$row->empresa][$row->id]['producto']=$row->producto;
                $ventas[$row->empresa][$row->id]['titulo']=$row->titulo;
                $ventas[$row->empresa][$row->id]['cantidad']=$row->cantidad;
                $ventas[$row->empresa][$row->id]['fecha']=$row->fecha;
            }
        }
        
        return $ventas;        
    }


    public function traer_ventas_empresa($empresa)
    {
        $ventas=array();
        $this->db->select("inventarios.id, inventarios.producto, productos.titulo, inventarios.cantidad, inventarios.fecha");
        $this->db->from('inventarios');
        $this->db->join('productos',"inventarios.producto=productos.referencia");
        $this->db->where('empresa',$empresa);
        $this->db->where('ingreso_salida','S');
        $query=$this->db->get();
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $ventas[$row->id]['producto']=$row->producto;
                $ventas[$row->id]['titulo']=$row->titulo;
                $ventas[$row->id]['cantidad']=$row->cantidad;
                $ventas[$row->id]['fecha']=$row->fecha;
            }
        }
        
        return $ventas;
    }

    public function registrar_venta($fecha,$empresa,$items)
    {        
        foreach ($items['items'] as $producto)
        {
            $data = array(
               'empresa' => $empresa ,
               'producto' => $producto['id'] ,
               'cantidad' => $producto['qty'],
               'fecha' => $fecha,
               'ingreso_salida' => 'S'
            );

            $this->db->insert('inventarios', $data);            
        }
        
        $this->cart->destroy();
    }

    public function traer_promedio_ventas_empresa($empresa)
    {
        $promedios=array();
        $this->db->select("producto, COUNT(producto) as cantidad, MONTH(fecha) as mes");
        $this->db->from("inventarios");
        $this->db->where("empresa",$empresa);
        $this->db->where('ingreso_salida','S');
        $this->db->group_by("producto, mes");
        $query=  $this->db->get();
        foreach ($query->result() as $row)
        {
            $promedios[$row->producto]['producto']=$row->producto;
            $promedios[$row->producto]['count']=0;
            $promedios[$row->producto]['total']=0;
            $promedios[$row->producto]['mes'][$row->mes]['cantidad']=$row->cantidad;
        }
        
        foreach ($promedios as $producto=>$promedio)
        {
            for($i=1;$i<=12;$i++)
            {
                if(!isset($promedio['mes'][$i]['cantidad']))
                {
                    $promedios[$producto]['mes'][$i]['cantidad']=0;
                }
                else
                {
                    $promedios[$producto]['count']++;
                    $promedios[$producto]['total']+=$promedio['mes'][$i]['cantidad'];
                    if(!isset($promedios[$producto]['min']))
                    {
                        $promedios[$producto]['min']=$promedio['mes'][$i]['cantidad'];
                    }
                    else
                    {
                        if($promedio['mes'][$i]['cantidad']<$promedios[$producto]['min'])
                        {
                            $promedios[$producto]['min']=$promedio['mes'][$i]['cantidad'];
                        }
                    }
                    
                    if(!isset($promedios[$producto]['max']))
                    {
                        $promedios[$producto]['max']=$promedio['mes'][$i]['cantidad'];
                    }
                    else
                    {
                        if($promedio['mes'][$i]['cantidad']>$promedios[$producto]['max'])
                        {
                            $promedios[$producto]['max']=$promedio['mes'][$i]['cantidad'];
                        }
                    }                    
                }
            }
        }
        
        return $promedios;
    }
            
}