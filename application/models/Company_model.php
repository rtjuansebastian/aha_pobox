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
class Company_model extends CI_Model 
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
    
    /**
     * Metodo que trae todos los usuarios
     * 
     * 
     */
    public function traer_empresas()
    {
        $empresas=array();
        $query=$this->db->get('empresas');
        foreach ($query->result() as $row)
        {
            $empresas[$row->id]['nit']=$row->nit;
            $empresas[$row->id]['razon_social']=$row->razon_social;
            $empresas[$row->id]['telefono']=$row->telefono;
            $empresas[$row->id]['extension']=$row->extension;
            $empresas[$row->id]['celular']=$row->celular;
            $empresas[$row->id]['contacto']=$row->contacto;
            $empresas[$row->id]['direccion']=$row->direccion;
        }
        
        return $empresas;
    }
    
    /**
     * Metodo el usuario solicitado
     * 
     * 
     */
    public function traer_empresa($nit)
    {
        $empresa=array();
        $this->db->where('nit',$nit);
        $query=$this->db->get('empresas');
        $row=$query->row();
        $empresa['nit']=$row->nit;
        $empresa['razon_social']=$row->razon_social;
        $empresa['telefono']=$row->telefono;
        $empresa['extension']=$row->extension;
        $empresa['celular']=$row->celular;
        $empresa['contacto']=$row->contacto;
        $empresa['direccion']=$row->direccion;
        
        return $empresa;
    }

    
}