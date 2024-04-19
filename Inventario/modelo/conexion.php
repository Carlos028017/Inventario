<?php
class Conexion {
    private static $conexion;

    public static function obtenerConexion() {
        if (!isset(self::$conexion)) {
            // Configurar los detalles de conexión según tu entorno
            self::$conexion = new mysqli("localhost", "root", "", "invetario_saikel.sql");
            if (self::$conexion->connect_error) {
                die("Error de conexión: " . self::$conexion->connect_error);
            }
        }
        return self::$conexion;
    }
}