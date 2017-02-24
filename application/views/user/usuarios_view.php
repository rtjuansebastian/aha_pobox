<?php $this->load->view("header");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Usuarios</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Empresa</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
foreach ($usuarios as $usuario)
{
?>
                            <tr>
                                <td><?=$usuario['cedula']?></td>
                                <td><?=$usuario['nombre']?></td>
                                <td><?=$usuario['email']?></td>
                                <td><?=$usuario['razon_social']?></td>
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