<?php
    require_once('../clases/cita.class.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST' 
        && isset($_GET['fecha']) 
        && isset($_GET['horaInicio'])
        && isset($_GET['horaFin'])
        && isset($_GET['estado'])
        && isset($_GET['cliente_cedula'])
        && isset($_GET['idmetodopago'])
        && isset($_GET['barbero_cedula'])
        && isset($_GET['idservicio'])
        && isset($_GET['idcategoria'])
         ){

            Cita::crearCita(
            $_GET['fecha'], 
            $_GET['horaInicio'], 
            $_GET['horaFin'],
            $_GET['estado'], 
            $_GET['cliente_cedula'],
            $_GET['idmetodopago'], 
            $_GET['barbero_cedula'],
            $_GET['idservicio'], 
            $_GET['idcategoria']
            );
        }

?>