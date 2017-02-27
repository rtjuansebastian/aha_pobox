<?php $this->load->view("header");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Hacer Venta</h1>
                    <div class="form-group">
                        <label for="producto">Producto</label>
                        <select class="form-control selectpicker" id="producto" data-live-search="true" data-dropup-Auto="false">
<?php
$cantidad=array();;
foreach ($inventario as $producto) 
{
    $cantidad[]=$producto['cantidad'];
?>
                        <option value="<?= $producto['referencia']?>" data-cantidad="<?= $producto['cantidad']?>" ><?=$producto['titulo']?></option>    
<?php
}
?>                                
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" id="cantidad" min="0" max="<?=$cantidad[0]?>" value="1"/>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="agregar_producto">Agregar</button>
                    </div>                    
                </div>                
                <div class="col-md-6">
                    <h1>Resumen venta</h1>
                    <label>Productos</label>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Referencia</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Quitar</th>
                        </tr>
                        </thead>
                        <tbody id="items_pedido">                    
<?php
foreach ($this->cart->contents() as $items) 
{
?>
                            <tr>                                
                                <td><?=$items['id']?></td>
                                <td><?=$items['name']?></td>
                                <td><?=$items['qty']?></td>
                                <td><button type="button" class="btn btn-danger glyphicon glyphicon-remove" name="quitar_item" id="quitar_item" onclick="quitar_item('<?= $items['rowid']?>')"></button></td>
                            </tr>                            
<?php                            
}   
?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Total productos</td>
                                <td></td>
                                <td id="total_productos"><?=$this->cart->total_items()?></td>
                                <td></td>
                            </tr>                            
                        </tfoot>
                    </table>
                </div>
                <div class="col-md-6 col-md-offset-3">
                    <h1 class="text-center">Fecha de la venta</h1>
                    <form method="post" action="<?=base_url()?>sales/registrar_venta">
                        <div class="form-group">
                            <div style="overflow:hidden;">
                                <div class="form-group">                                
                                    <div id="datetimepicker1">
                                        <input type='hidden' id="fecha" name="fecha"/>
                                    </div>                                                        
                                </div>
                            </div>                        
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">Hacer Venta</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>   
<script>
    $(document).ready(function () {
        $('#datetimepicker1').datetimepicker({
            locale:'es',
            format:"YYYY-MM-DD", 
            inline: true, 
            sideBySide: true, 
            stepping: 30
        });
        
        $("#producto").on('change',function(){
            var seleccionado = $(this).find('option:selected');
             // 'type' es lo que va a continuación del guión en data-type
            var cantidad = seleccionado.data('cantidad');            
            
            $("#cantidad").attr("max",cantidad);
            $("#cantidad").val(1);
        });
        
        $("#agregar_producto").on("click",function(){
            var referencia=$("#producto").val();
            var cantidad=$("#cantidad").val();
            $.ajax(
            {
                method: "POST",
                url: "<?php echo base_url(); ?>order/agregar_producto",
                data: {referencia:referencia, cantidad:cantidad},
                success: function (data)
                {
                    console.log(data);
                    var result= JSON.parse(data);
                    var items_pedido='';
                    $.each(result.items, function( llave, items) {
                        items_pedido=items_pedido+'<tr>'+
                                '<td>'+items.id+'</td>'+
                                '<td>'+items.name+'</td>'+
                                '<td>'+items.qty+'</td>'+
                                '<td><button type="button" class="btn btn-danger glyphicon glyphicon-remove" name="quitar_item" id="quitar_item" onclick="quitar_item(\''+items.rowid+'\')"></button></td>'+
                            '</tr>';                     
                    });
                    $('#items_pedido').html(items_pedido);
                    $('#total_productos').html(result.total);
                }                        
            });             
        });
    });
    
    function quitar_item(rowid)
    {    
        $.ajax(
        {
            data: {rowid: rowid},
            type: "POST",
            async: false,
            url: "<?php echo base_url(); ?>order/quitar_producto",
            success: function (data)
            {
                var result= JSON.parse(data);
                var items_pedido='';
                $.each(result.items, function( llave, items) {
                    items_pedido=items_pedido+'<tr>'+
                            '<td>'+items.id+'</td>'+
                            '<td>'+items.name+'</td>'+
                            '<td>'+items.qty+'</td>'+
                            '<td><button type="button" class="btn btn-danger glyphicon glyphicon-remove" name="quitar_item" id="quitar_item" onclick="quitar_item(\''+items.rowid+'\')"></button></td>'+
                        '</tr>';
                });
                $('#items_pedido').html(items_pedido);
                $('#total_productos').html(result.total);
            }
        });
    }    
</script>