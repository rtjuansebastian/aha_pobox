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
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico" />
    </head>
    <body>
        <header>
            <div class="container">
                <nav class="navbar navbar-default">
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
                                <li><a href="<?=  base_url()?>user/ver_perfil">Perfil<span class="sr-only">(current)</span></a></li>
                                <li><a href="<?=  base_url()?>company/ver_empresa">Empresa</a></li>
                                <li><a href="<?=  base_url()?>product/ver_productos">Productos</a></li>
                                <li><a href="<?=  base_url()?>inventory/ver_inventario">Inventario</a></li>
                                <li><a href="<?=  base_url()?>order/ver_pedidos_empresa">Pedidos</a></li>
                                <li><a href="<?=  base_url()?>sales/ver_ventas_empresa">Ventas</a></li>
                                <!--
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pedidos<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url(); ?>order/ver_pedidos_empresa">Ver todos los pedidos</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/clientes/proveedores">Proveedores</a></li>
                                        <li><a href="<?php echo base_url(); ?>admin/clientes/administradores">Administradores</a></li>                  
                                    </ul>
                                </li>               
                                -->
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo base_url(); ?>login/cerrar_sesion">Desconectar</a></li>            
                            </ul>                            
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </header>