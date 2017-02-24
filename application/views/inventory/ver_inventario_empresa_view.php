<?php $this->load->view("header");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Inventario</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Referencia</th>
                                <th>Titulo</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
foreach ($inventario as $producto)
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
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>  