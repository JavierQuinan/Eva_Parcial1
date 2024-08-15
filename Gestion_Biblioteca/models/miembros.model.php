<?php
// TODO: Clase de Miembros
require_once('../config/config.php');

class Miembros
{
    public function todos() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `Miembros`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($miembro_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `Miembros` WHERE `miembro_id`=$miembro_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($nombre, $apellido, $email, $fecha_suscripcion) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `Miembros` (`nombre`, `apellido`, `email`, `fecha_suscripcion`) 
                       VALUES ('$nombre', '$apellido', '$email', '$fecha_suscripcion')";
            if (mysqli_query($con, $cadena)) {
                return $con->insert_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function actualizar($miembro_id, $nombre, $apellido, $email, $fecha_suscripcion) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `Miembros` 
                       SET `nombre`='$nombre', `apellido`='$apellido', `email`='$email', `fecha_suscripcion`='$fecha_suscripcion' 
                       WHERE `miembro_id` = $miembro_id";
            if (mysqli_query($con, $cadena)) {
                return $miembro_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($miembro_id) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `Miembros` WHERE `miembro_id`= $miembro_id";
            if (mysqli_query($con, $cadena)) {
                return 1;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }
}
?>
