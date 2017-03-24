<?php $this->load->view("header_admin");  ?>      
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
                            <tr>
                                <th>Numero pedido: <?=$pedido['numero_pedido']?></th>
                                <th>Fecha: <?=$pedido['fecha']?></th>
                                <th>Estado:  <?=$pedido['estado']?></th>
                            </tr>
                            <tr>
                                <th>Empresa:</th>
                                <th><?=$pedido['empresa']?></th>
                                <th></th>
                            </tr>
                            <tr>
                                <th>Referencia</th>
                                <th>Titulo</th>
                                <th>cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
    foreach ($pedido['productos'] as $producto)
    {
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
                            <td></td>
                            <td></td>
                            <td><a class="btn btn-success" href="<?=base_url()?>admin/entregar_pedido?pedido=<?=$pedido['numero_pedido']?>">Entregar</a></td>
                        </tfoot>
                    </table>                    
<?php
}
?>                    
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>  