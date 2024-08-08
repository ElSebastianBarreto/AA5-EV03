<?php
    require_once('../connection/connection.php');

    class Cita{
        //funcion de crear usuarios
        public static function crearCita($fecha, $horaInicio,$horaFin,$estado,$cliente_cedula,
        $idmetodopago,$barbero_cedula,$idservicio,$idcategoria){
            $connection = new Connection();
            $conn = $connection->getConnection();
//query para insertar el usuario a la tabla usuarios
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
         
//mostrar si es correcto la creacion de usuarios o si hubo un error
            if($stmt->execute()){
                header('HTTP/1.1 201 Usuario creado correctamente');
            } else {
                header('HTTP/1.1 404 Usuario no se ha creado correctamente');
            }
        }

//funcion de obtener la informacion de un usuario
        public static function misCitas($cliente_cedula) {
            $database = new Connection();
            $conn = $database->getConnection();
            //query para obtener la informacion del usuario
            $stmt = $conn->prepare('SELECT * FROM cita WHERE cliente_cedula=:cliente_cedula');
            $stmt->bindParam(':cliente_cedula', $cliente_cedula);
            //mostrar si es correcto o no se encuentra el usuario
            if ($stmt->execute()) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($result);
                header('HTTP/1.1 200 OK');
            } else {
                header('HTTP/1.1 404 No se ha podido consultar la info');
            }
        }

    
    }
