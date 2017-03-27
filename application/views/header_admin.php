<!DOCTYPE html> 
<html lang="es">
    <head>
        <title>AHA PoBox</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">        
        <link rel="stylesheet" href="<?=  base_url()?>assets/css/bootstrap-spacelab.css" />
        <link rel="stylesheet" href="<?=  base_url()?>assets/css/fullcalendar.css" />
        <link rel="stylesheet" href="<?=  base_url()?>assets/css/datetimepicker.css" />
        <link rel="stylesheet" href="<?=  base_url()?>assets/css/multi-select.css" />
        <link rel="stylesheet" href="<?=  base_url()?>assets/css/estilos.css" />
        <link rel="stylesheet" href="<?=  base_url()?>assets/css/bootstrap-select.css" />
        <link rel="stylesheet" href="<?=  base_url()?>assets/css/tablesorter.css" />
        <link rel="stylesheet" href="<?=  base_url()?>assets/css/daterangepicker.css" />
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" />
    </head>
    <body>
        <header>
            <div class="container">
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                      <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                            <a class="navbar-brand" href="<?=  base_url()?>"><img alt="Brand" src="<?=  base_url()?>assets/img/logopobox1-12peq.png"></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuarios<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>admin/ver_usuarios">Ver usuarios</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/agregar_usuario">Agregar usuario</a></li>
                                    </ul>
                                </li>                                 
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Productos<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>admin/ver_productos">Ver productos</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/agregar_producto">Agregar producto</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Empresas<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>admin/ver_empresas">Ver empresas</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/agregar_empresa">Agregar empresa</a></li>
                                    </ul>
                                </li>                                
                                <li><a href="<?=  base_url()?>admin/ver_inventarios">Inventarios</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ordenes<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>admin/ver_pedidos">Ver ordenes de compra</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="<?php echo base_url(); ?>admin/ver_pedidos_solicitados">Ordenes solicitadas</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/ver_pedidos_confirmados">Ordenes confirmadas</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/ver_pedidos_en_proceso">Ordenes en proceso</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/ver_pedidos_entregados">Ordenes entregados</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="<?php echo base_url(); ?>admin/crear_pedido">Crear Orden</a></li>
                                    </ul>
                                </li>                                  
                                <li><a href="<?=  base_url()?>admin/ver_ventas">Salidas</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo base_url(); ?>login/cerrar_sesion">Desconectar</a></li>            
                            </ul>                            
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </header>