<?php $this->load->view("header");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Cambiar contraseña <?=$usuario['nombre']?></h1>
<?php
if(isset($resultado) && $resultado==TRUE)
{
?>
                    <p id="respuesta" class="bg-success">La constraseña ha sido cambiada</p>
<?php                    
}
elseif (isset($resultado) && $resultado!==TRUE) 
{
?>                          
                    <p id="respuesta" class="bg-danger">Contraseña incorrecta</p>
<?php
}
?>
                    <form method="post" action="<?=  base_url()?>user/cambiar_contrasena">
                        <input type="hidden" name="cedula" value="<?=$usuario['cedula']?>" />
                        <div class="form-group">
                            <label>Contraseña actual</label>
                            <input class="form-control" type="password" name="anterior" />
                        </div>
                        <div class="form-group">
                            <label>Nueva contraseña</label>
                            <input class="form-control nueva" type="password" name="nueva" id="nueva" required=""/>
                        </div>
                        <div class="form-group">
                            <label>Repetir contraseña</label>
                            <input class="form-control nueva" type="password" name="confirmacion" id="confirmacion" required=""/>
                        </div>                        
                        <button class="btn btn-primary" id="cambiar" disabled="">Cambiar contraseña</button>
                    </form>
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>
<script>
    $(document).ready(function(){
        $(".nueva").on("keyup",function(){
            if($("#nueva").val()!=="" && $("#confirmacion").val()!=="")
            {
                if($("#nueva").val()!==$("#confirmacion").val())
                {
                    $('#cambiar').prop('disabled', true);
                }
                else
                {
                    $('#cambiar').prop('disabled', false);
                }
            }
        });
    });
</script>