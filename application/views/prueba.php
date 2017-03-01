<?php $this->load->view("header");  ?>      
        <div class="container">
            <form class="form-inline" action="<?=  base_url()?>/index/prueba" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <span>Importar desde excel: </span>
                </div>
                <div class="form-group">
                    <span class="btn btn-sm btn-success btn-file  glyphicon glyphicon-search">
                        <input type="file" name="xlsxfile" size="40" required=""/>
                    </span>
                </div>
                <input type="hidden" name="convert" />
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name = "upload" value="subir"><span class="glyphicon glyphicon-open"></span></button>
                </div>
            </form>
            
<?php
            if(isset($productos))
            {
                
?>   
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>codigo</th>
                        <th>subpartida</th>
                        <th>REF</th>
                        <th>NOMBRE COMERCIAL</th>
                    </tr>
                </thead>
                <tbody>
<?php
foreach ($productos as $producto)
{
?>
                    <tr>
                        <td><?php if(isset($producto['codigo'])){ echo $producto['codigo'];}?></td>
                        <td><?php if(isset($producto['subpartida'])){ echo $producto['subpartida'];}?></td>
                        <td><?php if(isset($producto['descripciones']['REF'])){ echo $producto['descripciones']['REF'];}?></td>
                        <td><?php if(isset($producto['descripciones']['NOMBRE COMERCIAL'])){ echo $producto['descripciones']['NOMBRE COMERCIAL'];}?></td>
<?php
    foreach ($producto['descripciones'] as $descriptor => $valor)
    {
?>
                        <td><?=$descriptor?></td>
                        <td><?=$valor?></td>
<?php                        
    }
?>
                    </tr>
<?php                    
}
?>
                </tbody>
            </table>
<?php            
            }
?>
        </div>
<?php $this->load->view("footer");  ?>      