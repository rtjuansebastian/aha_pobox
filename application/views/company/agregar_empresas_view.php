<?php $this->load->view("header_admin");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="<?=base_url()?>admin/crear_empresa">
                        <div class="form-group">
                            <label for="nit">Nit</label>
                            <input type="text" class="form-control" id="nit" name="nit" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="razon_social">Razon social</label>
                            <input type="text" class="form-control" id="razon_social" name="razon_social" required=""/>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono"/>
                        </div>                        
                        <div class="form-group">
                            <label for="extension">Extension</label>
                            <input type="text" class="form-control" id="extension" name="extension"/>
                        </div>               
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion"/>
                        </div>   
                        <input type="hidden" name="rol" value="2"/>
                        <button type="submit" class="btn btn-primary">Crear empresa</button>
                    </form>
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>  