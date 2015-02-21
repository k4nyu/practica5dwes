<?php

function autoload($clase) {
    require '../clases/' . $clase . '.php';
}

spl_autoload_register('autoload');

$modelo = new ModeloProducto();
$productos = $modelo->getList();



?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" action="comprarpaypal.php">
            datos cliente: <textarea name ="cliente" rows="4" columns="20"></textarea>
            <input type="submit" value="pagar" />
        </form>
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
                            <td> <a href="phpcartsup.php?id=<?php echo $lineacesta->getProducto()->getId(); ?>">Restar Uno</a>
                                <a href="phpcartadd.php?id=<?php echo $lineacesta->getProducto()->getId(); ?>"> Añadir Uno</a>
                                <a href="phpcartdel.php?id=<?php echo $lineacesta->getProducto()->getId(); ?>">Borrar</a>
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
