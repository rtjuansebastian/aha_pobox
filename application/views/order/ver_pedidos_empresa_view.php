<?php $this->load->view("header");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Ordenes</h1>
<?php
foreach ($pedidos as $pedido)
{
?>
                    <table class="table table-bordered">
                        <thead>
                            <tr data-toggle="collapse" data-target="#numero_pedido<?=$pedido['numero_pedido']?>" class="accordion-toggle" style=" cursor: pointer">
                                <th class="size_ref">Numero pedido: <?=$pedido['numero_pedido']?></th>
                                <th class="size_fec">Fecha: <?=$pedido['fecha']?></th>
                                <th class="size_est">Estado:  <?=$pedido['estado']?></th>
                            </tr>
                            <tr>
                                <th>Referencia</th>
                                <th>Titulo</th>
                                <th>cantidad</th>
                            </tr>
                        </thead>
                        <tbody id="numero_pedido<?=$pedido['numero_pedido']?>" class="accordian-body collapse">
<?php
$total=0;
    foreach ($pedido['productos'] as $producto)
    {
        $total+=$producto['cantidad'];
?>
                            <tr>
                                <td><?=$producto['referencia']?></td>
                                <td><?=$producto['titulo']?></td>
                                <td><?=$producto['cantidad']?></td>
                            </tr>
<?php 
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
<?php
}
?>                    
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>  