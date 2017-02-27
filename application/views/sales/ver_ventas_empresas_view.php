<?php $this->load->view("header");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Ventas</h1>
                    <table class="table">
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
}
?>                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>  