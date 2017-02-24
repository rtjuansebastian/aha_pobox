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
class User_model extends CI_Model 
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
    public function traer_usuarios()
    {
        $usuarios=array();
        $this->db->select('cedula, nombre, email, empresa, razon_social');
        $this->db->from('usuarios');
        $this->db->join('empresas','usuarios.empresa=empresas.id');
        $query=$this->db->get();
        foreach ($query->result() as $row)
        {
            $usuarios[$row->cedula]['cedula']=$row->cedula;
            $usuarios[$row->cedula]['nombre']=$row->nombre;
            $usuarios[$row->cedula]['email']=$row->email;
            $usuarios[$row->cedula]['empresa']=$row->empresa;
            $usuarios[$row->cedula]['razon_social']=$row->razon_social;
        }
        
        return $usuarios;
    }
    
    /**
     * Metodo el usuario solicitado
     * 
     * 
     */
    public function traer_usuario($cedula)
    {
        $usuario=array();
        $this->db->select('cedula, nombre, email, empresa, razon_social');
        $this->db->from('usuarios');
        $this->db->join('empresas','usuarios.empresa=empresas.id');
        $this->db->where('cedula',$cedula);
        $query=$this->db->get();
        $row=$query->row();
        $usuario['cedula']=$row->cedula;
        $usuario['nombre']=$row->nombre;
        $usuario['email']=$row->email;
        $usuario['empresa']=$row->empresa;
        $usuario['razon_social']=$row->razon_social;
        
        return $usuario;
    }    
}