<?php $this->load->view("header");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Productos</h1>
                    <table class="table tablesorter-default" id="tabla_productos">
                        <thead>
                            <tr>
                                <th>Referencia</th>
                                <th>Titulo</th>
                                <th>Version</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
foreach ($productos as $producto)
{
?>
                            <tr>
                                <td><?=$producto['referencia']?></td>
                                <td><?=$producto['titulo']?></td>
                                <td><?=$producto['version']?></td>
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
        <script>
            $(document).ready(function() 
            {
                $("#tabla_productos").tablesorter(); 
            });
        </script>