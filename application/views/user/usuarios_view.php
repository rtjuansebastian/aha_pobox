<?php $this->load->view("header_admin");  ?>       
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Usuarios</h1>
                    <table class="table tablesorter-default" id="tabla_usuarios">
                        <thead>
                            <tr>
                                <th>Cedula</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Celular</th>
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
                                <td><?=$usuario['celular']?></td>
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
        <script>
            $(document).ready(function() 
            {
                $("#tabla_usuarios").tablesorter(); 
            });
        </script>