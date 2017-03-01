<?php $this->load->view("header_admin");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table tablesorter-default" id="tabla_ventas">
                        <thead>
                            <tr>
                                <th>Empresa</th>
                                <th>Referencia</th>
                                <th>Titulo</th>
                                <th>Cantidad</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$total=0;
foreach ($ventas as $ventas_empresa)
{
    foreach ($ventas_empresa as $venta)
    {
?>
                            <tr>
                                <td><?=$venta['empresa']?></td>
                                <td><?=$venta['producto']?></td>
                                <td><?=$venta['titulo']?></td>
                                <td><?=$venta['cantidad']?></td>
                                <td><?=$venta['fecha']?></td>
                            </tr>
<?php
$total+=$venta['cantidad'];
    }
}
?>
                        </tbody>
                        <tfoot>
                            <tr class="active">
                                <td>Total</td>
                                <td></td>
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