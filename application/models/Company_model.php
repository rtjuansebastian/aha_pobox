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
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $empresas[$row->id]['id']=$row->id;
                $empresas[$row->id]['nit']=$row->nit;
                $empresas[$row->id]['razon_social']=$row->razon_social;
                $empresas[$row->id]['telefono']=$row->telefono;
                $empresas[$row->id]['extension']=$row->extension;
                $empresas[$row->id]['contacto']=$row->contacto;
                $empresas[$row->id]['direccion']=$row->direccion;
                $empresas[$row->id]['rol']=$row->rol;
            }            
        }
        
        return $empresas;
    }
    
    /**
     * Metodo el usuario solicitado
     * 
     * 
     */
    public function traer_empresa($id)
    {
        $empresa=array();        
        $this->db->where('id',$id);
        $query=$this->db->get('empresas');
        if($query->num_rows()>0)
        {
            $row=$query->row();
            $empresa['id']=$row->id;
            $empresa['nit']=$row->nit;
            $empresa['razon_social']=$row->razon_social;
            $empresa['telefono']=$row->telefono;
            $empresa['extension']=$row->extension;
            $empresa['contacto']=$row->contacto;
            $empresa['direccion']=$row->direccion;
            $empresa['rol']=$row->rol;            
        }
        
        return $empresa;
    }

    public function editar_campo_empresa($empresa,$campo,$valor)
    {
        $data = array(
               $campo => $valor
        );

        $this->db->where('id', $empresa);
        $this->db->update('empresas', $data);         
    }
    
    public function traer_usuarios_empresa($empresa)
    {
        $usuarios=array();
        $this->db->where("empresa",$empresa);
        $query=$this->db->get("usuarios");
        foreach ($query->result() as $row)
        {
            $usuarios[$row->cedula]['cedula']=$row->cedula;
            $usuarios[$row->cedula]['nombre']=$row->nombre;
            $usuarios[$row->cedula]['email']=$row->email;
            $usuarios[$row->cedula]['celular']=$row->celular;
        }
        
        return $usuarios;
    }
    
    public function traer_contactos_empresas()
    {
        $contactos=array();
        $this->db->select("id, contacto, nombre");
        $this->db->from("empresas");
        $this->db->join("usuarios","empresas.contacto=usuarios.cedula");
        $query=  $this->db->get();
        foreach ($query->result() as $row)
        {
            $contactos[$row->id]['id']=$row->id;
            $contactos[$row->id]['contacto']=$row->contacto;
            $contactos[$row->id]['nombre']=$row->nombre;
        }
        
        return $contactos;
    }
    
    public function cambiar_contacto_empresa($id,$contacto)
    {
        $data=array(
            "contacto" => $contacto
        );
        $this->db->where("id",$id);
        $this->db->update("empresas",$data);
    }
    
    public function crear_empresa($data)
    {
        $this->db->insert('empresas', $data); 
    }
}