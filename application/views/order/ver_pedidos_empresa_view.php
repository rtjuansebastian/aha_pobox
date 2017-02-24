<?php $this->load->view("header");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Pedidos</h1>
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
                    </table>
<?php
}
?>                    
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>  