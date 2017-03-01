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

class Index extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('PHPExcel/Classes/PHPExcel');
        $this->load->model('cargar_model');
    }
    
    /**
     * Metodo index
     * 
     * Este metodo es el encargado de cargar la pagina de inicio.
     */    
    public function index()
    {
        $this->load->view('index_view');
    }
    
    
    
    public function prueba()
    {
        $productos=array();
        if (null !==$this->input->post("convert")) 
        {            
            $filetoname = basename($_FILES['xlsxfile']['name']); 
            if($filetoname=="")
            {
                $alert = "Seleccione un Archivo";    
            }
            else
            {
                $ext = substr($filetoname,-4);
                if($ext!="xlsx")
                {
                    $alert = "Tipo de archivo invalido. Seleccione un archivo '.xlsx'.";
                }
                else
                {
                    $result = @move_uploaded_file($_FILES['xlsxfile']['tmp_name'], $filetoname); // upload it 
                    $file=$filetoname;
                    $newcsvfile  = str_replace(".xlsx",".csv",$file);
                    //$newcsvfile="C:/Users/Juan/Documents/".$newcsvfile;
                    $newcsvfile="/tmp/".$newcsvfile;
                    $objPHPExcel = new PHPExcel();
                    $objPHPExcel->convertXLStoCSV($file,$newcsvfile);
                    $archivo_excel=$this->cargar_model->cargar_csv($newcsvfile);
                }
            }
        }
        foreach ($archivo_excel as $registro)
        {
            $productos[$registro['CODIGO DEL PRODUCTO']]['codigo']=$registro['CODIGO DEL PRODUCTO'];
            $productos[$registro['CODIGO DEL PRODUCTO']]['subpartida']=$registro['SUBPARTIDA'];
            $texto=$registro['DESCRIPCION'];
            $lineas = explode("\n", $texto);
            $descripciones=array();
            foreach ($lineas as $linea)
            {
                $pos = strpos($linea, ":");
                if($pos)
                {
                    $descriptor[0]= substr($linea, 0, $pos);                
                    $descriptor[1]= substr($linea, $pos+1);
                }
                else 
                {
                    $descriptor[0]=$linea;
                }
                //$descriptor=  explode(":", $linea);
                if(isset($descriptor[1]))
                {
                    $descripciones[$descriptor[0]]=$descriptor[1];
                }
                else
                {
                    $descripciones[$descriptor[0]]="";
                }
                unset($descriptor);
            }
            $productos[$registro['CODIGO DEL PRODUCTO']]['descripciones']=$descripciones;
        }
        $datos['productos']=$productos;
        $this->load->view('prueba',$datos);
    }
}