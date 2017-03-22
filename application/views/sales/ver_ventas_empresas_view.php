<?php $this->load->view("header");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Salidas de inventario</h1>
                    <form class="form-inline" id="form_filtrar">
                        <div class="form-group">
                            <label for="producto">Producto</label>
                            <select class="form-control selectpicker" data-live-search="true" data-dropup-Auto="false" name="producto">
                                <option value=""></option>
<?php
foreach ($ventas as $producto)
{
    $productos[$producto['producto']]['referencia']=$producto['producto'];
    $productos[$producto['producto']]['titulo']=$producto['titulo'];
}
foreach ($productos as $producto)
{
?>
                                <option value="<?=$producto['referencia']?>"><?=$producto['titulo']?></option>
<?php 
}
?>                                  
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="daterange">Periodo</label>
                            <br>
                            <input type="text" class="form-control" name="daterange" value="" />
                        </div>
                        <div class="form-group">
                            <label></label>
                            <br>
                            <button type="button" class="btn btn-default" id="filtrar_ventas">Filtrar</button>
                            <button type="button" class="btn btn-default" id="deshacer_filtros">Deshacer filtros</button>
                        </div>
                    </form>                    
                    <table class="table tablesorter-default" id="tabla_ventas">
                        <thead>
                            <tr>
                                <th>Referencia</th>                                
                                <th>Titulo</th>                                
                                <th>Cantidad</th>
                                <th>fecha</th>
                            </tr>
                        </thead>
                        <tbody id="ventas">
<?php
$total=0;
foreach ($ventas as $venta)
{
?>
                            <tr>
                                <td><?=$venta['producto']?></td> 
                                <td><?=$venta['titulo']?></td> 
                                <td><?=$venta['cantidad']?></td>                           
                                <td><?=$venta['fecha']?></td>
                            </tr>
<?php 
$total+=$venta['cantidad'];
}
?>                            
                        </tbody>
                        <tfoot>
                            <tr class="active">
                                <td>Total</td>
                                <td></td>
                                <td id="total"><?=$total?></td>
                                <td></td>
                            </tr>
                        </tfoot>                        
                    </table>
                </div>
            </div>
        </div>
<?php $this->load->view("footer");  ?>  
        <script>
            $(document).ready(function() 
            {
                $("#tabla_ventas").tablesorter(); 
                $("#deshacer_filtros").click(function(){
                   location.reload(); 
                });
                $("#filtrar_ventas").click(function(){
                    var dataString = $('#form_filtrar').serialize();                    
                    $.ajax({
                        type: "POST",
                        url: "<?=  base_url()?>sales/filtrar_ventas",
                        data: dataString,
                        success: function (data)
                        {
                            var result= $.parseJSON(data);
                            var ventas='';
                            var total=0;
                            $.each(result, function( llave, items) {
                                ventas+=    '<tr>'+
                                                    '<td>'+items.producto+'</td>'+
                                                    '<td>'+items.titulo+'</td>'+
                                                    '<td>'+items.cantidad+'</td> '+                          
                                                    '<td>'+items.fecha+'</td> '+
                                                '</tr>';
                                total+=parseInt(items.cantidad);
                            });
                            $("#ventas").html(ventas);
                            $("#total").html(total);
                        }
                    });                       
                });
            });
            
            $(function() {
                $('input[name="daterange"]').daterangepicker({
                "locale": {
                       "format": "YYYY-MM-DD",
                       "separator": " / ",
                       "applyLabel": "Seleccionar",
                       "cancelLabel": "Cancelar",
                       "fromLabel": "Desde",
                       "toLabel": "Hasta",
                       "customRangeLabel": "Custom",
                       "weekLabel": "W",
                       "daysOfWeek": ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                       "monthNames": ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]
                   }
                });
            });
            
            $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' / ' + picker.endDate.format('YYYY-MM-DD'));
            });

            $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });                   
        </script>