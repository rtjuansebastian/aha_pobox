<?php $this->load->view("header_admin");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="<?=base_url()?>admin/crear_producto">
                        <div class="form-group">
                            <label for="referencia">Referencia</label>
                            <input type="text" class="form-control" id="referencia" name="referencia"/>
                        </div>
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input type="text" class="form-control" id="titulo" name="titulo"/>
                        </div>
                        <div class="form-group">
                            <label for="version">Versión</label>
                            <input type="text" class="form-control" id="version" name="version"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear producto</button>
                    </form>
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>  