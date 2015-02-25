<?php

function autoload($clase) {
    require '../clases/' . $clase . '.php';
}

spl_autoload_register('autoload');

$bd = new BaseDatos();
$modelo = new ModeloProducto($bd);
$productos = $modelo->getList();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Realizar compra</title>
        <link rel="stylesheet" href="../css/estilos.css">
        <meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/templatemo_main.css">
    </head>
    <body>
        <div class="template-page-wrapper">
            <div class="templatemo-content-wrapper">
                <div class="templatemo-content">
                    <h2>Contenido de la cesta</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Nombre </th>
                                <th> Precio </th>
                                <th> Cantidad </th>
                                <th> Iva (%) </th>
                            </tr>
                        </thead>
                        <?php
                        session_start();
                        if (isset($_SESSION["__cesta"])) {
                            $cesta = $_SESSION["__cesta"];
                            ?> 

                            <tbody>
                                <?php
                                $total = 0;
                                $precio = 0;
                                foreach ($cesta as $key => $lineacesta) {
                                    ?>
                                    <tr>
                                        <td><?php echo $lineacesta->getProducto()->getNombre(); ?></td>
                                        <td><?php echo $lineacesta->getProducto()->getPrecio(); ?></td>
                                        <td><?php echo $lineacesta->getCantidad(); ?></td>
                                        <td><?php echo $lineacesta->getProducto()->getIva(); ?></td>
                                    </tr>
                                    <?php
                                    //cerramos el bucle
                                    $precio = $lineacesta->getCantidad() * $lineacesta->getProducto()->getPrecio();
                                    $total = $precio + $total;
                                }
                                ?>
                            </tbody>
                            <?php
                        }
                        ?>
                    </table>
                    <div>
                        <h3>Total: <?php echo $total; ?> &euro;</h3>
                    </div>

                    <form class="form-horizontal templatemo-signin-form" method="POST" action="phpcompra.php">
                        Nombre: <input class="form-control" type="text" name="nombre"><br>
                        Dirección: <input class="form-control" type="text" name="direccion"><br>
                        <input type="hidden" value="<?php echo $total; ?>" name="total">
                        <input class="btn btn-default" type="submit" value="Pagar" />
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
