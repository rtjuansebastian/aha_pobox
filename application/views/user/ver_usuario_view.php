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
                                <td><span><?=$usuario['cedula']?></span></td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td><span><?=$usuario['nombre']?></span></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><span><?=$usuario['email']?></span></td>
                            </tr>
                            <tr>
                                <td>Celular</td>
                                <td><span><?=$usuario['celular']?></span></td>
                            </tr>                            
                            <tr>
                                <td>Empresa</td>
                                <td><span><?=$usuario['razon_social']?></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>