<?php
require '../require/comun.php';

$bd = new BaseDatos();
$modelo = new ModeloVenta($bd);
$ventas = $modelo->getList();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Administración</title>
        <meta charset="utf-8">
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
        <title>Dashboard, Free HTML5 Admin Template</title>
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
        <h1>Administración</h1>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Id Venta</td>
                        <td>Fecha</td>
                        <td>Hora</td>
                        <td>Pago</td>
                        <td>Dirección de envío</td>
                        <td>Nombre</td>
                        <td>Total</td>
                    </tr>
                    <?php
                    foreach ($ventas as $value) {
                        ?>

                        <tr>
                            <td><?php echo $value->getIdventa(); ?></td>
                            <td><?php echo $value->getFecha(); ?></td>
                            <td><?php echo $value->getHora(); ?></td>
                            <td><?php echo $value->getPago(); ?></td>
                            <td><?php echo $value->getDirenvio(); ?></td>
                            <td><?php echo $value->getNombre(); ?></td>
                            <td><?php echo $value->getTotal(); ?></td>
                            <td><a href="verdetalleventa.php?idventa=<?php echo $value->getIdventa(); ?>">Ver</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </thead>
            </table>
        </div>
        </div>
      </div>
    </body>
</html>