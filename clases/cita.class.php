<?php
    require_once('../connection/connection.php');

    class Cita{
        //funcion de crear citas
        public static function crearCita($fecha, $horaInicio,$horaFin,$estado,$cliente_cedula,
        $idmetodopago,$barbero_cedula,$idservicio,$idcategoria){
            $connection = new Connection();
            $conn = $connection->getConnection();
//query para insertar informacion de la cita
            $stmt = $conn->prepare('INSERT INTO cita(fecha, horaInicio, horaFin,estado,cliente_cedula,
            idmetodopago,barbero_cedula,idservicio,idcategoria)
                VALUES(:fecha, :horaInicio, :horaFin,:estado, :cliente_cedula,
                :idmetodopago,:barbero_cedula,:idservicio,:idcategoria)');
            $stmt->bindParam(':fecha',$fecha);
            $stmt->bindParam(':horaInicio',$horaInicio);
            $stmt->bindParam(':horaFin',$horaFin);
            $stmt->bindParam(':estado',$estado);
            $stmt->bindParam(':cliente_cedula',$cliente_cedula,  PDO::PARAM_INT);
            $stmt->bindParam(':idmetodopago',$idmetodopago,  PDO::PARAM_INT);
            $stmt->bindParam(':barbero_cedula',$barbero_cedula, PDO::PARAM_INT);
            $stmt->bindParam(':idservicio',$idservicio, PDO::PARAM_INT);
            $stmt->bindParam(':idcategoria',$idcategoria, PDO::PARAM_INT);
         
//mostrar si es correcto la creacion de la cita o si hubo un error
            if($stmt->execute()){
                header('HTTP/1.1 201 Cita agendada correctamente');
            } else {
                header('HTTP/1.1 404 Error al crear cita');
            }
        }

//funcion de obtener todas las citas de un cliente
        public static function misCitas($cliente_cedula) {
            $database = new Connection();
            $conn = $database->getConnection();
            //query para obtener las citas dada una cedula
            $stmt = $conn->prepare('SELECT * FROM cita WHERE cliente_cedula=:cliente_cedula');
            $stmt->bindParam(':cliente_cedula', $cliente_cedula);
            //mostrar si es correcto
            if ($stmt->execute()) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($result);
                header('HTTP/1.1 200 OK');
            } else {
                header('HTTP/1.1 404 No se ha podido consultar la info');
            }
        }

    
    }
