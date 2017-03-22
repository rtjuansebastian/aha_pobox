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

class Inventory extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventory_model');
        $this->load->model('user_model');
        $this->load->model('company_model');
    }    
    
    public function ver_inventario()
    {
        $usuario=$this->session->userdata('sesion'); 
        $datos['usuario']=$this->user_model->traer_usuario($usuario['cedula']);       
        $datos['inventario']=$this->inventory_model->traer_inventario($datos['usuario']['empresa']);
        $this->load->view('inventory/ver_inventario_empresa_view',$datos);
    } 
    
    public function filtrar_inventario()
    {
        $usuario=$this->session->userdata('sesion'); 
        $datos['usuario']=$this->user_model->traer_usuario($usuario['cedula']);               
        $producto=null;
        if($this->input->post('producto')!==''){$producto=$this->input->post('producto');}
        $rango=$this->input->post('daterange');
        $fecha=  explode("/", $rango);
        $inventario=$this->inventory_model->traer_inventario($datos['usuario']['empresa'],$producto,$fecha[0],$fecha[1]);
        echo json_encode($inventario);
    }    
}