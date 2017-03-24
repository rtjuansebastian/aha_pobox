<?php $this->load->view("header_admin");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="<?=base_url()?>admin/crear_usuario">
                        <div class="form-group">
                            <label for="cedula">Cedula</label>
                            <input type="text" class="form-control" id="cedula" name="cedula" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular"/>
                        </div>                        
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required=""/>
                        </div>                        
                        <div class="form-group">
                            <label for="empresa">Empresa</label>
                            <select class="form-control selectpicker" data-live-search="true" data-dropup-Auto="false" name="empresa" required="">
                                <option value=""></option>
<?php
foreach ($empresas as $empresa)
{
?>
                                <option value="<?=$empresa['id']?>"><?=$empresa['razon_social']?></option>
<?php 
}
?>                                  
                            </select>
                        </div>                        
                        <button type="submit" class="btn btn-primary">Crear usuario</button>
                    </form>
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>  