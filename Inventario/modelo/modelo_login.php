<?php

class UsuarioModelo {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerUsuarioPorNombre($nombreUsuario) {
        $query = "SELECT id_usuario, usuario, contraseña FROM usuarios WHERE usuario = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $nombreUsuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc();
        } else {
            return false;
        }
    }
}

?>
