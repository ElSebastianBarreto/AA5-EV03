<?php
    require_once('../clases/cita.class.php');

    if($_SERVER['REQUEST_METHOD'] == 'GET' 
        && isset($_GET['cliente_cedula']) ){
            Cita::misCitas($_GET['cliente_cedula']);
        }

?>