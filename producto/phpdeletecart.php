<?php

function autoload($clase) {
    require '../clases/' . $clase . '.php';
}
session_start();
session_destroy();

header("Location: ../index.php");
