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
                                <td class="id"><span><?=$usuario['cedula']?></span></td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td class='editable' data-campo='nombre'><span><?=$usuario['nombre']?></span></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td class='editable' data-campo='email'><span><?=$usuario['email']?></span></td>
                            </tr>
                            <tr>
                                <td>Celular</td>
                                <td class='editable' data-campo='celular'><span><?=$usuario['celular']?></span></td>
                            </tr>                            
                            <tr>
                                <td>Empresa</td>
                                <td class="id"><span><?=$usuario['razon_social']?></span></td>
                            </tr>
                        </tbody>
                    </table>
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
                        url: "<?=base_url()?>user/editar_campo_usuario",
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
