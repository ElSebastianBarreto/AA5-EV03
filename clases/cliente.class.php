<?php
    require_once('../connection/connection.php');

    class Cliente{public static function login($cedula,$clave){    
        $database = new Connection();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('SELECT * FROM cliente WHERE cedula=:cedula AND clave=:clave');
        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':clave', $clave);
        //mostrar si es correcto o no el login
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $result = $stmt->fetch();
            echo json_encode(["message" => "Login correcto", "cedula" => $result['cedula']]);
            header('HTTP/1.1 200 OK');
        } else {
            echo json_encode(["message" => "la clave o usuario son incorrectos"]);
            header('HTTP/1.1 401 Unauthorized');
        }
    
    }
        }