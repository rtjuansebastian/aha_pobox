<?php $this->load->view("header");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Inventarios</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Empresa</th>
                                <th>Referencia</th>
                                <th>Titulo</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
foreach ($inventarios as $inventario)
{
?>
                            <tr>
                                <td><?=$inventario['empresa']?></td>
                                <td><?=$inventario['referencia']?></td>
                                <td><?=$inventario['titulo']?></td>
                                <td><?=$inventario['cantidad']?></td>                           
                            </tr>
<?php 
}
?>                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>  