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
class Cargar_model extends CI_Model 
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
    
    public function cargar_csv($newcsvfile)
    {
        if (($gestor = fopen($newcsvfile, "r")) !== FALSE) 
        {
            $filas=0;
            $titulos=fgetcsv($gestor, 1000, ",");
            //$titulos=fgetcsv($gestor, 1000, ",");
            while (($datos=fgetcsv($gestor, 1000, ",","\""))!=FALSE) 
            {                
                $numero = count($datos);                            
                $registro=  $this->cargar_model->guardar_csv_array($numero,$titulos,$datos);
                $registros[]=$registro;
                $filas++;
            }
            fclose($gestor);
            return $registros;
        }
        else
        {
            return false;
        }
    }

    public function guardar_csv_array($numero,$titulos,$datos)
    {
        $registro=array();
        for ($c=0; $c < $numero; $c++) 
        {
            $registro[$titulos[$c]]=$datos[$c];
        }
        return $registro;
    }    
  
}    