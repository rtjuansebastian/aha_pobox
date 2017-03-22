<?php $this->load->view("header");  ?>      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Inventario</h1>
                    <form class="form-inline" id="form_filtrar">
                        <div class="form-group">
                            <label for="producto">Producto</label>
                            <select class="form-control selectpicker" data-live-search="true" data-dropup-Auto="false" name="producto">
                                <option value=""></option>
<?php
foreach ($inventario as $producto)
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
                            <button type="button" class="btn btn-default" id="filtrar_inventario">Filtrar</button>
                        </div>
                    </form>
                    <table class="table tablesorter-default" id="tabla_inventarios">
                        <thead>
                            <tr>
                                <th>Referencia</th>
                                <th>Titulo</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody id="inventario">
<?php
$total=0;
foreach ($inventario as $producto)
{
?>
                            <tr>
                                <td><?=$producto['referencia']?></td>
                                <td><?=$producto['titulo']?></td>
                                <td><?=$producto['cantidad']?></td>                           
                            </tr>
<?php 
$total+=$producto['cantidad'];
}
?>                            
                        </tbody>
                        <tfoot>
                            <tr class="active">
                                <td>Total</td>
                                <td></td>
                                <td><?=$total?></td>
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
                $("#tabla_inventarios").tablesorter(); 
                
                $("#filtrar_inventario").click(function(){
                    var dataString = $('#form_filtrar').serialize();                    
                    $.ajax({
                        type: "POST",
                        url: "<?=  base_url()?>inventory/filtrar_inventario",
                        data: dataString,
                        success: function (data)
                        {
                            var result= $.parseJSON(data);
                            var inventario='';
                            $.each(result, function( llave, items) {
                                inventario+=    '<tr>'+
                                                    '<td>'+items.referencia+'</td>'+
                                                    '<td>'+items.titulo+'</td>'+
                                                    '<td>'+items.cantidad+'</td> '+                          
                                                '</tr>';
                            });
                            $("#inventario").html(inventario);
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
                $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            });

            $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });            
        </script>