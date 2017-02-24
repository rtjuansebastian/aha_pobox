<?php $this->load->view("header");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Empresas</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nit</th>
                                <th>Nombre</th>
                                <th>Telefono</th>
                                <th>Extension</th>
                                <th>Celular</th>
                                <th>Contacto</th>
                                <th>Dirección</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
foreach ($empresas as $empresa)
{
?>
                            <tr>
                                <td><?=$empresa['nit']?></td>
                                <td><?=$empresa['razon_social']?></td>
                                <td><?=$empresa['telefono']?></td>
                                <td><?=$empresa['extension']?></td>
                                <td><?=$empresa['celular']?></td>
                                <td><?=$empresa['contacto']?></td>
                                <td><?=$empresa['direccion']?></td>                              
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