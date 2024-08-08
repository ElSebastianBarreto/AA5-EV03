<?php
    require_once('../connection/connection.php');

    class Barbero{  
            public static function CitasxDia($barbero_cedula,$fecha) {
        $database = new Connection();
        $conn = $database->getConnection();
        //query para obtener la informacion necesaria para un babrbero en una fecha especifica
        $stmt = $conn->prepare('SELECT c.fecha, c.horainicio, c.horafin, 
        c.estado, m.nombremetodo, s.titulo, cl.nombre,cl.apellido,cl.telefono FROM cita c
        inner join cliente cl
        on c.cliente_cedula=cl.cedula
        inner join metododepago m
        on c.idmetodopago=m.idmetodo
        inner join servicio s
        on c.idservicio=s.idservicio
        WHERE barbero_cedula=:barbero_cedula AND fecha=:fecha');
        $stmt->bindParam(':barbero_cedula', $barbero_cedula);
        $stmt->bindParam(':fecha', $fecha);
        //mostrar si se realizo correctamente 
        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            header('HTTP/1.1 200 OK');
        } else {
            header('HTTP/1.1 404 No se ha podido consultar la info');
        }
    }


}
