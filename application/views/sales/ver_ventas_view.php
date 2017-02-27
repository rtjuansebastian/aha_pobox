<?php $this->load->view("header_admin");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
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
    }
}
?>                    </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>  