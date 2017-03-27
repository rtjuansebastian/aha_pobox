<?php $this->load->view("header_admin");  ?>       
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Inventarios</h1>
                    <form class="form-inline" method="post" action="<?=base_url()?>admin/filtrar_inventarios">
                        <div class="form-group">
                            <label for="empresa">Empresa</label>
                            <select class="form-control selectpicker" data-live-search="true" data-dropup-Auto="false" name="empresa">
                                <option value=""></option>
<?php
foreach ($empresas as $empresa)
{
?>
                                <option value="<?=$empresa['id']?>"><?=$empresa['razon_social']?></option>
<?php
}
?>                                 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="producto">Producto</label>
                            <select class="form-control selectpicker" data-live-search="true" data-dropup-Auto="false" name="producto">
                                <option value=""></option>
<?php
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
                            <label></label>
                            <br>
                            <button type="submit" class="btn btn-default">Filtrar</button>
                        </div>
                    </form>                    
                    <table class="table tablesorter-default" id="tabla_inventarios">
                        <thead>
                            <tr>
                                <th>Empresa</th>
                                <th>Referencia</th>
                                <th>Titulo</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$total=0;
foreach ($inventarios as $inventario)
{
?>
                            <tr>
                                <td><?=$inventario['empresa']?></td>
                                <td><?=$inventario['referencia']?></td>
                                <td><?=$inventario['titulo']?></td>
                                <td><?=$inventario['cantidad']?></td>                           
                            </tr>
<?php
$total+=$inventario['cantidad'];
}
?>                            
                        </tbody>
                        <tfoot>
                            <tr class="active">
                                <td>Total</td>
                                <td></td>
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
                   },
                startDate: moment().startOf('month')
                });
            });
            
            $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' / ' + picker.endDate.format('YYYY-MM-DD'));
            });

            $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });               
        </script>