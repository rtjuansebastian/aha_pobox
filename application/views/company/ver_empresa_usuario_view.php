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
                                <td class='editable' data-campo='nit'><span><?=$empresa['nit']?></span></td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td class="id"><span><?=$empresa['razon_social']?></span></td>
                            </tr>
                            <tr>
                                <td>Telefono</td>
                                <td class='editable' data-campo='telefono'><span><?=$empresa['telefono']?></span></td>
                            </tr>
                            <tr>
                                <td>Extension</td>
                                <td class='editable' data-campo='extension'><span><?=$empresa['extension']?></span></td>
                            </tr>
                            <tr>
                                <td>Direccion</td>
                                <td class='editable' data-campo='direccion'><span><?=$empresa['direccion']?></span></td>
                            </tr>
                            <tr>
                                <td>Contacto</td>
                                <td class='id'>
<?php
if(isset($contacto['cedula']))
{
?>
                                    <span><a href="<?=  base_url()?>user/ver_usuario?usuario=<?=$contacto['cedula']?>"><?=$contacto['nombre']?></a></span> <button class="btn btn-primary btn-xs glyphicon glyphicon-pencil" data-toggle="modal" data-target="#ModalCambiarContacto"></button></td>
<?php
}
else {
?>
                                <button class="btn btn-primary btn-xs glyphicon glyphicon-pencil" data-toggle="modal" data-target="#ModalCambiarContacto"></button>
<?php                                
}
?>
                            </tr>                             
                        </tbody>
                    </table>
<?php
$sesion = $this->session->userdata('sesion'); 
if($sesion['rol']=='1')
{?>
                    <a class="btn btn-primary" href="<?=base_url()?>admin/">Ir al panel de administración</a>
<?php

}
?>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="ModalCambiarContacto" tabindex="-1" role="dialog" aria-labelledby="ModalLabelCambiarContacto">
            <div class="modal-dialog" role="document">
                <form method="post" action="<?=  base_url()?>company/cambiar_contacto_empresa">
                    <input type="hidden" name="id" value="<?=$empresa['id']?>"/>
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="ModalLabelCambiarContacto">Cambiar contacto</h4>
                        </div>
                        <div class="modal-body">
                            <h4>Usuarios <?=$empresa['razon_social']?></h4>
                            <div class="form-group">
                                <label>Usuario</label>
                                <select class="form-control selectpicker" name="contacto" id="contacto" required="">
                                    <option></option>
<?php
foreach ($usuarios as $usuario)
{
?>
                                    <option value="<?=$usuario['cedula']?>"><?=$usuario['nombre']?></option>
<?php
}
?>
                                </select>
                            </div>                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<?php $this->load->view("footer");  ?> 
        <script>
            $(document).ready(function() 
            {
		var td,campo,valor;
		$(document).on("click","td.editable",function(e)
		{
                    e.preventDefault();
                    $("td:not(.id)").removeClass("editable");
                    td=$(this).closest("td");
                    campo=$(this).closest("td").data("campo");
                    valor=$(this).text();
                    id=$(this).closest("tr").find(".id").text();
                    td.text("").html("<input type='text' name='"+campo+"' value='"+valor+"'><a class='enlace guardar' href='#'>Guardar</a><a class='enlace cancelar' href='#'>Cancelar</a>");
		});
		
		$(document).on("click",".cancelar",function(e)
		{
                    e.preventDefault();
                    td.html("<span>"+valor+"</span>");
                    $("td:not(.id)").addClass("editable");
		});
		
		$(document).on("click",".guardar",function(e)
		{
                    $(".mensaje").html("<img src='../../estilos/imagenes/loading.gif'>");
                    e.preventDefault();
                    nuevovalor=$(this).closest("td").find("input").val();
                    $.ajax({
                        type: "POST",
                        url: "<?=base_url()?>company/editar_campo_empresa",
                        data: { campo: campo, valor: nuevovalor}
                    })
                    .done(function( msg ) {
                            $(".mensaje").html(msg);
                            td.html("<span>"+nuevovalor+"</span>");
                            $("td:not(.id)").addClass("editable");
                            //$("tr:not(.id)").removeClass("duda");
                            setTimeout(function() {$('.ok,.ko').fadeOut('fast');}, 3000);
                    });
		});                        
            });                
        </script>  