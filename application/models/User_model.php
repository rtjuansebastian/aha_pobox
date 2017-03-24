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
        $this->load->model("login_model");
    }
    
    /**
     * Metodo que trae todos los usuarios
     * 
     * 
     */
    public function traer_usuarios()
    {
        $usuarios=array();
        $this->db->select('cedula, nombre, email, celular, empresa, razon_social');
        $this->db->from('usuarios');
        $this->db->join('empresas','usuarios.empresa=empresas.id');
        $query=$this->db->get();
        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $usuarios[$row->cedula]['cedula']=$row->cedula;
                $usuarios[$row->cedula]['nombre']=$row->nombre;
                $usuarios[$row->cedula]['email']=$row->email;
                $usuarios[$row->cedula]['celular']=$row->celular;
                $usuarios[$row->cedula]['empresa']=$row->empresa;
                $usuarios[$row->cedula]['razon_social']=$row->razon_social;
            }
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
        $this->db->select('cedula, nombre, email, celular, empresa, razon_social');
        $this->db->from('usuarios');
        $this->db->join('empresas','usuarios.empresa=empresas.id');
        $this->db->where('cedula',$cedula);
        $query=$this->db->get();
        if($query->num_rows()>0)
        {
            $row=$query->row();
            $usuario['cedula']=$row->cedula;
            $usuario['nombre']=$row->nombre;
            $usuario['email']=$row->email;
            $usuario['celular']=$row->celular;
            $usuario['empresa']=$row->empresa;
            $usuario['razon_social']=$row->razon_social;
        }
        
        return $usuario;
    }

    public function editar_campo_usuario($cedula,$campo,$valor)
    {
        $data = array(
               $campo => $valor
        );

        $this->db->where('cedula', $cedula);
        $this->db->update('usuarios', $data); 
    }
    
    public function crear_usuario($usuario)
    {        
        $this->db->insert('usuarios', $usuario); 
        
        $this->db->select("contacto");
        $this->db->where("id",$usuario['empresa']);
        $query=$this->db->get("empresas");
        if($query->num_rows()>0)
        {
            $row=$query->row();
            if(!$row->contacto)
            {
                $data = array(
                              'contacto' => $usuario['cedula']
                           );

               $this->db->where('id', $usuario['empresa']);
               $this->db->update('empresas', $data);                 
            }
        }
    }

    public function cambiar_contrasena($cedula,$anterior,$nueva)
    {
        $validacion=FALSE;  
        $this->db->where('cedula',$cedula);
        $query=$this->db->get('usuarios');
        if($query->num_rows()>0)
        {
            $row=$query->row();
            $hash=$row->password;            
            //$hash = $this->login_model->get_hash($password);
            
            $validacion = $this->login_model->validate_pass($hash, $anterior);
            if($validacion)
            {
                $nuevo_hash=$this->login_model->get_hash($nueva);
                $data = array(
                               'password' => $nuevo_hash
                            );

                $this->db->where('cedula', $cedula);
                $this->db->update('usuarios', $data);                 
                
                return TRUE;
            }
        }
        
        return FALSE;
    }
}