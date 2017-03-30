<?php $this->load->view("header");  ?>      
        <div class="container">
            <div class="row">
                <h1 class="text-center">Proyección</h1>
                <div class="col-md-12">
                    <h3>Inventario actual</h3>
                    <table class="table tablesorter-default" id="tabla_inventarios">
                        <thead>
                            <tr>
                                <th>Referencia</th>
                                <th>Titulo</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$total=0;
foreach ($inventario as $producto)
{
?>
                            <tr>
                                <td><?=$producto['referencia']?></td>
                                <td><?=$producto['titulo']?></td>
                                <td><?=$producto['cantidad']?></td>                           
                            </tr>
<?php 
$total+=$producto['cantidad'];
}
?>                            
                        </tbody>
                        <tfoot>
                            <tr class="active">
                                <td>Total</td>
                                <td></td>
                                <td><?=$total?></td>
                            </tr>
                        </tfoot>                         
                    </table>                    
                </div>
                <div class="col-md-12">
                    <h3>Salidas de inventario</h3>
                    <table class="table tablesorter-default" id="tabla_promedios">
                        <thead>
                            <tr>
                                <th>Referencia</th>
                                <th>Enero</th>
                                <th>Febrero</th>
                                <th>Marzo</th>
                                <th>Abril</th>
                                <th>Mayo</th>
                                <th>Junio</th>
                                <th>Julio</th>
                                <th>Agosto</th>
                                <th>Septiembre</th>
                                <th>Octubre</th>
                                <th>Noviembre</th>
                                <th>Diciembre</th>
                                <th>Total</th>
                                <th>Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$totales=array();
$total=0;
$total_promedio=0;
for($i=1;$i<=12;$i++)
{
    $totales[$i]=0;   
}   
foreach ($promedios as $promedio)
{
    for($i=1;$i<=12;$i++)
    {
        $totales[$i]+=$promedio['mes'][$i]['cantidad'];   
    }
    $promedio['promedio']=($promedio['total'])/($promedio['count']);
    $total+=$promedio['total'];
    $total_promedio+=$promedio['promedio'];
?>
                            <tr>
                                <td><?=$promedio['producto']?></td> 
                                <td><?=$promedio['mes'][1]['cantidad']?></td> 
                                <td><?=$promedio['mes'][2]['cantidad']?></td> 
                                <td><?=$promedio['mes'][3]['cantidad']?></td> 
                                <td><?=$promedio['mes'][4]['cantidad']?></td> 
                                <td><?=$promedio['mes'][5]['cantidad']?></td> 
                                <td><?=$promedio['mes'][6]['cantidad']?></td> 
                                <td><?=$promedio['mes'][7]['cantidad']?></td> 
                                <td><?=$promedio['mes'][8]['cantidad']?></td> 
                                <td><?=$promedio['mes'][9]['cantidad']?></td> 
                                <td><?=$promedio['mes'][10]['cantidad']?></td> 
                                <td><?=$promedio['mes'][11]['cantidad']?></td> 
                                <td><?=$promedio['mes'][12]['cantidad']?></td> 
                                <td><?=$promedio['total']?></td> 
                                <td><?=  round($promedio['promedio'],1)?></td>
                            </tr>
<?php 
}
?>                            
                        </tbody>
                        <tfoot>
                            <tr class="active">
                                <td>Total</td>
                                <td><?=$totales[1]?></td>
                                <td><?=$totales[2]?></td>
                                <td><?=$totales[3]?></td>
                                <td><?=$totales[4]?></td>
                                <td><?=$totales[5]?></td>
                                <td><?=$totales[6]?></td>
                                <td><?=$totales[7]?></td>
                                <td><?=$totales[8]?></td>
                                <td><?=$totales[9]?></td>
                                <td><?=$totales[10]?></td>
                                <td><?=$totales[11]?></td>
                                <td><?=$totales[12]?></td>                                
                                <td><?=$total?></td> 
                                <td><?=$total_promedio?></td> 
                            </tr>
                        </tfoot>                        
                    </table>                    
                </div>
                <div class="col-md-12">
                    <h3 id="mes"></h3>
                    <table class="table tablesorter-default" id="tabla_inventarios">
                        <thead>
                            <tr>
                                <th>Referencia</th>
                                <th>Titulo</th>
                                <th>Cantidad en inventario</th>
                                <th>Promedio de salidas</th>
                                <th data-toggle="tooltip" data-placement="top" title="La proyección se realiza suponiendo un incremento constante en las ventas">Proyección Sobrantes/faltantes</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$total=0;
foreach ($catalogo as $producto)
{
    if($producto['proyeccion']<0)
    {
?>
                            <tr class="danger">
<?php
    }
    else
    {
?>
                            <tr class="success">
<?php                                
    }
?>    
                                <td><?=$producto['referencia']?></td>
                                <td><?=$producto['titulo']?></td>
                                <td><?=$producto['cantidad_inventario']?></td>
                                <td><?=  round($producto['promedio_ventas'],1)?></td>
                                <td><?=round ($producto['proyeccion'],0)?></td>
                            </tr>
<?php
$total+=$producto['proyeccion'];
}
?>                            
                        </tbody>
                        <tfoot>
                            <tr class="active">
                                <td>Total</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><?=  round($total)?></td>
                            </tr>
                        </tfoot>                         
                    </table>  
                </div>
                <a href="<?=  base_url()?>order/solicitar_proyeccion">Crear orden</a>
            </div>
        </div>
<?php $this->load->view("footer");  ?>    
<script>
    $(document).ready(function(){
        moment.locale('es');
        var mes= moment().add(1,'month');
        $("#mes").html("Proyección para "+mes.format("MMMM"));
        
        $(function () {
          $('[data-toggle="tooltip"]').tooltip();
        });
    });
</script>
