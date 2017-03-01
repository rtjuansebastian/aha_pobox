<?php $this->load->view("header");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Salidas de inventario</h1>
                    <table class="table tablesorter-default" id="tabla_ventas">
                        <thead>
                            <tr>
                                <th>Referencia</th>                                
                                <th>Titulo</th>                                
                                <th>Cantidad</th>
                                <th>fecha</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$total=0;
foreach ($ventas as $venta)
{
?>
                            <tr>
                                <td><?=$venta['producto']?></td> 
                                <td><?=$venta['titulo']?></td> 
                                <td><?=$venta['cantidad']?></td>                           
                                <td><?=$venta['fecha']?></td>
                            </tr>
<?php 
$total+=$venta['cantidad'];
}
?>                            
                        </tbody>
                        <tfoot>
                            <tr class="active">
                                <td>Total</td>
                                <td></td>
                                <td><?=$total?></td>
                                <td></td>
                            </tr>
                        </tfoot>                        
                    </table>
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>  
        <script>
            $(document).ready(function() 
            {
                $("#tabla_ventas").tablesorter(); 
            });
        </script>