<?php
    require_once('../clases/metodopago.class.php');

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        MetodoPago::listarMetodos();
        }

?>