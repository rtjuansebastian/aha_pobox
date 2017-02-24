<?php $this->load->view("header");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Perfil <?=$empresa['razon_social']?></h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nit</td>
                                <td><?=$empresa['nit']?></td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td><?=$empresa['razon_social']?></td>
                            </tr>
                            <tr>
                                <td>Telefono</td>
                                <td><?=$empresa['telefono']?></td>
                            </tr>
                            <tr>
                                <td>Extension</td>
                                <td><?=$empresa['extension']?></td>
                            </tr>
                            <tr>
                                <td>Celular</td>
                                <td><?=$empresa['celular']?></td>
                            </tr>
                            <tr>
                                <td>Contacto</td>
                                <td><?=$empresa['contacto']?></td>
                            </tr> 
                            <tr>
                                <td>Direccion</td>
                                <td><?=$empresa['direccion']?></td>
                            </tr>                             
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>  