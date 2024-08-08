<?php
    require_once('../connection/connection.php');

    class MetodoPago{
        public static function listarMetodos() {
            $database = new Connection();
            $conn = $database->getConnection();
            //query para obtener la informacion del usuario
            $stmt = $conn->prepare('SELECT * FROM metododepago');
        
            if ($stmt->execute()) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                echo json_encode($result);
                header('HTTP/1.1 200 OK');
            } else {
                header('HTTP/1.1 404 No se ha podido consultar la info');
            }
        }

        }