<!DOCTYPE html>
<?php
require '../require/comun.php';

$idventa = Leer::get("idventa");
$bd = new BaseDatos();
$modelo = new ModeloDetalleVenta($bd);
$ventas = $modelo->getList("idventa=$idventa");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ver detalles de la venta</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width">        
        <link rel="stylesheet" href="../css/templatemo_main.css">
    </head>
    <body>
        <div class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
                <div class="logo"><h1>Dashboard - Admin Template</h1></div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
            </div>   
        </div>
        <div class="template-page-wrapper">
            <div class="navbar-collapse collapse templatemo-sidebar">
                <ul class="templatemo-sidebar-menu">
                    <li>
                        <form class="navbar-form">
                            <input type="text" class="form-control" id="templatemo_search_box" placeholder="Search...">
                            <span class="btn btn-default">Go</span>
                        </form>
                    </li>
                    <li class="active"><a href="#"><i class="fa fa-home"></i>Dashboard</a></li>
                    <li class="sub open">
                        <a href="javascript:;">
                            <i class="fa fa-database"></i> Nested Menu <div class="pull-right"><span class="caret"></span></div>
                        </a>
                        <ul class="templatemo-submenu">
                            <li><a href="#">Aenean</a></li>
                            <li><a href="#">Pellentesque</a></li>
                            <li><a href="#">Congue</a></li>             
                            <li><a href="#">Interdum</a></li>
                            <li><a href="#">Facilisi</a></li>
                        </ul>
                    </li>
                    <li><a href="data-visualization.html"><i class="fa fa-cubes"></i><span class="badge pull-right">9</span>Data Visualization</a></li>
                    <li><a href="maps.html"><i class="fa fa-map-marker"></i><span class="badge pull-right">42</span>Maps</a></li>
                    <li><a href="tables.html"><i class="fa fa-users"></i><span class="badge pull-right">NEW</span>Manage Users</a></li>
                    <li><a href="preferences.html"><i class="fa fa-cog"></i>Preferences</a></li>
                    <li><a href="../index.php" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
                </ul>
            </div>
            <div class="templatemo-content-wrapper">
                <div class="templatemo-content">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Id Venta</td>
                                <td>Id Detalle Venta</td>
                                <td>Id Producto</td>
                                <td>Cantidad</td>
                                <td>Precio</td>
                                <td>Iva</td>
                            </tr>
                            <?php
                            foreach ($ventas as $value) {
                                ?>
                                <tr>
                                    <td><?php echo $value->getIdventa(); ?></td>
                                    <td><?php echo $value->getIddetalleventa(); ?></td>
                                    <td><?php echo $value->getIdproducto(); ?></td>
                                    <td><?php echo $value->getCantidad(); ?></td>
                                    <td><?php echo $value->getPrecio(); ?></td>
                                    <td><?php echo $value->getIva(); ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </thead>
                    </table>

                    <a href="admin.php">Volver al panel principal</a>
                </div>
            </div>
        </div>
    </body>
</html>
