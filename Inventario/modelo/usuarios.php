<?php

class Usuario {
    public static function obtenerNombreCliente($usuario_id) {
        $conexion = Conexion::obtenerConexion();
        $query_info_cliente = "SELECT usuario AS nombre
                               FROM usuarios
                               WHERE id_usuario = ?";

        $stmt = $conexion->prepare($query_info_cliente);
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result_info_cliente = $stmt->get_result();

        if ($result_info_cliente->num_rows > 0) {
            $fila_info_cliente = $result_info_cliente->fetch_assoc();
            return $fila_info_cliente['nombre'];
        }

        $stmt->close();
        return '';
    }
}

?>