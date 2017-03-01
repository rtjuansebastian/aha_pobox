<?php $this->load->view("header_admin");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Productos</h1>
                    <table class="table tablesorter-default" id="tabla_productos">
                        <thead>
                            <tr>
                                <th>Referencia</th>
                                <th>Titulo</th>
                                <th>Version</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
foreach ($productos as $producto)
{
?>
                            <tr>
                                <td class="id"><?=$producto['referencia']?></td>
                                <td class="editable" data-campo='titulo'><span><?=$producto['titulo']?></span></td>
                                <td class="editable" data-campo='version'><span><?=$producto['version']?></span></td>
                            </tr>
<?php 
}
?>                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>  
        <script>
            $(document).ready(function() 
            {
                $("#tabla_productos").tablesorter(); 
		var td,campo,valor,id;
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
                    if(nuevovalor.trim()!="")
                    {
                            $.ajax({
                                    type: "POST",
                                    url: "<?=base_url()?>admin/editar_campo_producto",
                                    data: { campo: campo, valor: nuevovalor, referencia:id}
                            })
                            .done(function( msg ) {
                                    $(".mensaje").html(msg);
                                    td.html("<span>"+nuevovalor+"</span>");
                                    $("td:not(.id)").addClass("editable");
                                    setTimeout(function() {$('.ok,.ko').fadeOut('fast');}, 3000);
                            });
                    }
                    else $(".mensaje").html("<p class='ko'>Debes ingresar un valor</p>");
		});                        
            });                
        </script> 