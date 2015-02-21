<?php

function autoload($clase) {
    require 'clases/' . $clase . '.php';
}

spl_autoload_register('autoload');

$modelo = new ModeloProducto();
$productos = $modelo->getList();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>cesta</title>
    </head>
    <body>
        <h1>cesta</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>descripcion</th>
                    <th>iva</th>
                    <th>precio</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($productos as $indice => $valor) {
                    ?>
                    <tr>
                        <td><?php echo $valor->getNombre(); ?></td>
                        <td><?php echo $valor->getDescripcion(); ?></td>
                        <td><?php echo $valor->getIva(); ?></td>
                        <td><?php echo $valor->getPrecio(); ?></td>
                        <td><a href="producto/phpcartadd.php?id=<?php echo $valor->getId(); ?>">añadir a la cesta</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <a href="producto/realizarcompra.php">confirmar compra</a>
        <h2>contenido de la cesta</h2>
        <table border="1">
            <thead>
                <tr>
                    <th> Nombre </th>
                    <th> Precio </th>
                    <th> Cantidad </th>
                </tr>
            </thead>
            <?php
            session_start();
            if (isset($_SESSION["__cesta"])) {
                $cesta = $_SESSION["__cesta"];
                ?> 

                <tbody>
                    <?php
                    foreach ($cesta as $key => $lineacesta) {
                        ?>
                        <tr>
                            <td><?php echo $lineacesta->getProducto()->getNombre(); ?></td>
                            <td><?php echo $lineacesta->getProducto()->getPrecio(); ?></td>
                            <td><?php echo $lineacesta->getCantidad(); ?></td>
                            <td> <a href="producto/phpcartsup.php?id=<?php echo $lineacesta->getProducto()->getId(); ?>">Restar Uno</a>
                                <a href="producto/phpcartadd.php?id=<?php echo $lineacesta->getProducto()->getId(); ?>"> Añadir Uno</a>
                                <a href="producto/phpcartdel.php?id=<?php echo $lineacesta->getProducto()->getId(); ?>">Borrar</a>
                            </td>
                        </tr>
                    <?php
                    //cerramos el bucle
                }
                ?>
                </tbody>
                <?php
            }
            ?>
        </table>
    </body>
</html>