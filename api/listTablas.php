<?php
    require_once('../clases/tablas.class.php');

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        ListarTodo::ListarTodo();
        }

?>