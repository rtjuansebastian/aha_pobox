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
                        <th>PRODUCTO</th>
                        <th>COMPOSICION</th>
                        <th>COMPOSICION PORCENTUAL</th>
                       <th>MATERIA CONSTITUTIVA</th>
                        <th>CONTENIDO DE FIBRA</th>
                        <th>PRESENTACION</th>
                        <th>FORMA DE PRESENTACION</th>
                        <th>DIMENSIONES</th>
                        <th>DIMENSIONES EN LARGO, ANCHO Y/O ESPESOR, DEPENDIENDO DEL TIPO DEL PRODUCTO</th>
                        <th>CARACTERISTICAS</th>
                        <th>MASA POR UNIDAD DE AREA</th>
                        <th>ESPESOR</th>
                        <th>PORCENTAJE DE PLASTIFICANTES</th>
                        <th>ORIGEN</th>
                        <th>PROCESO DE OBTENCION</th>
                        <th>CONSTRUCCION</th>
                        <th>ASPECTO FISICO</th>
                        <th>FORMA DE SECCION TRANSVERSAL INTERIOR</th>
                        <th>FORMA DE LA SECCION TRANSVERSAL</th>
                        <th>TIPO DE ACABADO</th>
                        <th>ACABADO</th>
                        <th>ACABADO POR COLOR</th>
                        <th>OTROS ACABADOS</th>
                        <th>ANCHO TOTAL DEL TEJIDO</th>
                        <th>TIPO DE TEJIDO UTILIZADO</th>
                        <th>TIPO DE UNION</th>
                        <th>PRESION DE TRABAJO</th>
                        <th>PORCENTAJE DESTILADO Y TEMPERATURA DE DESTILACION</th>
                        <th>TIPO DE EMPAQUE</th>
                        <th>TIPO DE EMPAQUE Y CONTENIDO</th>
                        <th>TIPO DE SOPORTE</th>
                        <th>ESPESOR DE LA HOJA O TIRA</th>
                        <th>POTENCIA</th>
                        <th>TENSION</th>
                        <th>USO</th>
                        <th>TIPO</th>
                        <th>MARCA</th>
                        <th>TIPO DE MATERIAL</th>
                        <th>USO O DESTINO</th>
                        <th>VARIAS</th>
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
                        <td><?php if(isset($producto['descripciones']['PRODUCTO'])){ echo $producto['descripciones']['PRODUCTO'];}?></td>
                        <td><?php if(isset($producto['descripciones']['COMPOSICION'])){ echo $producto['descripciones']['COMPOSICION'];}?></td>
                        <td><?php if(isset($producto['descripciones']['COMPOSICION PORCENTUAL'])){ echo $producto['descripciones']['COMPOSICION PORCENTUAL'];}?></td>
                        <td><?php if(isset($producto['descripciones']['MATERIA CONSTITUTIVA'])){ echo $producto['descripciones']['MATERIA CONSTITUTIVA'];}?></td>
                        <td><?php if(isset($producto['descripciones']['CONTENIDO DE FIBRA'])){ echo $producto['descripciones']['CONTENIDO DE FIBRA'];}?></td>
                        <td><?php if(isset($producto['descripciones']['PRESENTACION'])){ echo $producto['descripciones']['PRESENTACION'];}?></td>
                        <td><?php if(isset($producto['descripciones']['FORMA DE PRESENTACION'])){ echo $producto['descripciones']['FORMA DE PRESENTACION'];}?></td>
                        <td><?php if(isset($producto['descripciones']['DIMENSIONES'])){ echo $producto['descripciones']['DIMENSIONES'];}?></td>
                        <td><?php if(isset($producto['descripciones']['DIMENSIONES EN LARGO, ANCHO Y/O ESPESOR, DEPENDIENDO DEL TIPO DEL PRODUCTO'])){ echo $producto['descripciones']['DIMENSIONES EN LARGO, ANCHO Y/O ESPESOR, DEPENDIENDO DEL TIPO DEL PRODUCTO'];}?></td>
                        <td><?php if(isset($producto['descripciones']['CARACTERISTICAS'])){ echo $producto['descripciones']['CARACTERISTICAS'];}?></td>
                        <td><?php if(isset($producto['descripciones']['MASA POR UNIDAD DE AREA'])){ echo $producto['descripciones']['MASA POR UNIDAD DE AREA'];}?></td>
                        <td><?php if(isset($producto['descripciones']['ESPESOR'])){ echo $producto['descripciones']['ESPESOR'];}?></td>
                        <td><?php if(isset($producto['descripciones']['PORCENTAJE DE PLASTIFICANTES'])){ echo $producto['descripciones']['PORCENTAJE DE PLASTIFICANTES'];}?></td>
                        <td><?php if(isset($producto['descripciones']['ORIGEN'])){ echo $producto['descripciones']['ORIGEN'];}?></td>
                        <td><?php if(isset($producto['descripciones']['PROCESO DE OBTENCION'])){ echo $producto['descripciones']['PROCESO DE OBTENCION'];}?></td>
                        <td><?php if(isset($producto['descripciones']['CONSTRUCCION'])){ echo $producto['descripciones']['CONSTRUCCION'];}?></td>
                        <td><?php if(isset($producto['descripciones']['ASPECTO FISICO'])){ echo $producto['descripciones']['ASPECTO FISICO'];}?></td>
                        <td><?php if(isset($producto['descripciones']['FORMA DE SECCION TRANSVERSAL INTERIOR'])){ echo $producto['descripciones']['FORMA DE SECCION TRANSVERSAL INTERIOR'];}?></td>
                        <td><?php if(isset($producto['descripciones']['FORMA DE LA SECCION TRANSVERSAL'])){ echo $producto['descripciones']['FORMA DE LA SECCION TRANSVERSAL'];}?></td>
                        <td><?php if(isset($producto['descripciones']['TIPO DE ACABADO'])){ echo $producto['descripciones']['TIPO DE ACABADO'];}?></td>
                        <td><?php if(isset($producto['descripciones']['ACABADO'])){ echo $producto['descripciones']['ACABADO'];}?></td>
                        <td><?php if(isset($producto['descripciones']['ACABADO POR COLOR'])){ echo $producto['descripciones']['ACABADO POR COLOR'];}?></td>
                        <td><?php if(isset($producto['descripciones']['OTROS ACABADOS'])){ echo $producto['descripciones']['OTROS ACABADOS'];}?></td>
                        <td><?php if(isset($producto['descripciones']['ANCHO TOTAL DEL TEJIDO'])){ echo $producto['descripciones']['ANCHO TOTAL DEL TEJIDO'];}?></td>
                        <td><?php if(isset($producto['descripciones']['TIPO DE TEJIDO UTILIZADO'])){ echo $producto['descripciones']['TIPO DE TEJIDO UTILIZADO'];}?></td>
                        <td><?php if(isset($producto['descripciones']['TIPO DE UNION'])){ echo $producto['descripciones']['TIPO DE UNION'];}?></td>
                        <td><?php if(isset($producto['descripciones']['PRESION DE TRABAJO'])){ echo $producto['descripciones']['PRESION DE TRABAJO'];}?></td>
                        <td><?php if(isset($producto['descripciones']['PORCENTAJE DESTILADO Y TEMPERATURA DE DESTILACION'])){ echo $producto['descripciones']['PORCENTAJE DESTILADO Y TEMPERATURA DE DESTILACION'];}?></td>
                        <td><?php if(isset($producto['descripciones']['TIPO DE EMPAQUE'])){ echo $producto['descripciones']['TIPO DE EMPAQUE'];}?></td>
                        <td><?php if(isset($producto['descripciones']['TIPO DE EMPAQUE Y CONTENIDO'])){ echo $producto['descripciones']['TIPO DE EMPAQUE Y CONTENIDO'];}?></td>
                        <td><?php if(isset($producto['descripciones']['TIPO DE SOPORTE'])){ echo $producto['descripciones']['TIPO DE SOPORTE'];}?></td>
                        <td><?php if(isset($producto['descripciones']['ESPESOR DE LA HOJA O TIRA'])){ echo $producto['descripciones']['ESPESOR DE LA HOJA O TIRA'];}?></td>
                        <td><?php if(isset($producto['descripciones']['POTENCIA'])){ echo $producto['descripciones']['POTENCIA'];}?></td>
                        <td><?php if(isset($producto['descripciones']['TENSION'])){ echo $producto['descripciones']['TENSION'];}?></td>
                        <td><?php if(isset($producto['descripciones']['USO'])){ echo $producto['descripciones']['USO'];}?></td>
                        <td><?php if(isset($producto['descripciones']['TIPO'])){ echo $producto['descripciones']['TIPO'];}?></td>
                        <td><?php if(isset($producto['descripciones']['MARCA'])){ echo $producto['descripciones']['MARCA'];}?></td>
                        <td><?php if(isset($producto['descripciones']['TIPO DE MATERIAL'])){ echo $producto['descripciones']['TIPO DE MATERIAL'];}?></td>
                        <td><?php if(isset($producto['descripciones']['USO O DESTINO'])){ echo $producto['descripciones']['USO O DESTINO'];}?></td>
                        <td><?php if(isset($producto['descripciones']['VARIAS'])){ echo $producto['descripciones']['VARIAS'];}?></td>                        
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