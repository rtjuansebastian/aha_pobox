<?php $this->load->view("header");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Perfil <?=$usuario['nombre']?></h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Cedula</td>
                                <td><?=$usuario['cedula']?></td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td><?=$usuario['nombre']?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?=$usuario['email']?></td>
                            </tr>
                            <tr>
                                <td>Empresa</td>
                                <td><?=$usuario['razon_social']?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>  
