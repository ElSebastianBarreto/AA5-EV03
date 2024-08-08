
<?php
    require_once('../clases/barbero.class.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST' 
        && isset($_GET['barbero_cedula'])  && isset($_GET['fecha']) ){
            Barbero::CitasxDia($_GET['barbero_cedula'], $_GET['fecha']);
        }

?>