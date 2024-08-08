
<?php
    require_once('../clases/cliente.class.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST' 
        && isset($_GET['cedula'])  && isset($_GET['clave']) ){
            Cliente::login($_GET['cedula'], $_GET['clave']);
        }

?>