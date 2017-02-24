<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador de index la aplicación
 * 
 * Este controlador conecta las funciones del modelo y las 
 * vistas del index.
 * 
 * @package AHA
 * @autor Juan Sebastián Rodríguez <rtjuansebastian@gmail.com>
 * @version 1.0
 * @copyright PoBox
 */

class Product extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }
    
    public function ver_productos()
    {
        $datos['productos']=$this->product_model->traer_productos();
        $this->load->view('product/productos_view',$datos);
    }
    
    public function ver_producto()
    {
        $referencia=$this->input->get('referencia');
        $datos['producto']=$this->product_model->traer_producto($referencia);
        $this->load->view('product/ver_producto_view',$datos);
    }    
    
}