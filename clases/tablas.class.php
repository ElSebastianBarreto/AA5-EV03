<?php
    require_once('../connection/connection.php');

    class ListarTodo{
        public static function ListarTodo() {
            $database = new Connection();
            $conn = $database->getConnection();
            //querys para obtener la infomracion de las tablas 
            $stmt = $conn->prepare('SELECT * FROM metododepago');
            $barbero = $conn->prepare('SELECT * FROM barbero');
            $servicio = $conn->prepare('SELECT * FROM servicio');
            $categoriaServicio = $conn->prepare('SELECT * FROM categoriaservicio');
            $cliente = $conn->prepare('SELECT * FROM cliente');
        //verificar si se realizo correctamente el stmt
            if ($stmt->execute()) {
                echo "metodos de pago";
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                echo json_encode($result);
                
                header('HTTP/1.1 200 OK');
            } 

            if ($barbero->execute()) {
                echo "Barberos";
                $result = $barbero->fetch(PDO::FETCH_ASSOC);
                echo json_encode($result);
               
                header('HTTP/1.1 200 OK');
            } 

            if ($servicio->execute()) {
                echo "Servicios";
                $result = $servicio->fetch(PDO::FETCH_ASSOC);
                echo json_encode($result);
               
                header('HTTP/1.1 200 OK');
            } 
            
            if ($categoriaServicio->execute()) {
                echo "Categorias de servicios";
                $result = $categoriaServicio->fetch(PDO::FETCH_ASSOC);
                echo json_encode($result);
               
                header('HTTP/1.1 200 OK');
            } 

            if ($cliente->execute()) {
                echo "Clientes";
                $result = $cliente->fetch(PDO::FETCH_ASSOC);
                echo json_encode($result);
               
                header('HTTP/1.1 200 OK');
            } 
        }

        }