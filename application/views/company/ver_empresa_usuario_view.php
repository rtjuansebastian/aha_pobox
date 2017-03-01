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
                                <td><span><?=$empresa['nit']?></span></td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td><span><?=$empresa['razon_social']?></span></td>
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
                                <td>Celular</td>
                                <td class='editable' data-campo='celular'><span><?=$empresa['celular']?></span></td>
                            </tr>
                            <tr>
                                <td>Contacto</td>
                                <td class='editable' data-campo='contacto'><span><?=$empresa['contacto']?></span></td>
                            </tr> 
                            <tr>
                                <td>Direccion</td>
                                <td class='editable' data-campo='direccion'><span><?=$empresa['direccion']?></span></td>
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