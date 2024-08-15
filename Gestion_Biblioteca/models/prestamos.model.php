<?php
// TODO: Clase de Prestamos
require_once('../config/config.php');

class Prestamos
{
    public function todos() {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `Prestamos`";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function uno($prestamo_id) {
        $con = new ClaseConectar();
        $con = $con->ProcedimientoParaConectar();
        $cadena = "SELECT * FROM `Prestamos` WHERE `prestamo_id`=$prestamo_id";
        $datos = mysqli_query($con, $cadena);
        $con->close();
        return $datos;
    }

    public function insertar($libro_id, $miembro_id, $fecha_prestamo, $fecha_devolucion = null) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "INSERT INTO `Prestamos` (`libro_id`, `miembro_id`, `fecha_prestamo`, `fecha_devolucion`) 
                       VALUES ('$libro_id', '$miembro_id', '$fecha_prestamo', " . ($fecha_devolucion ? "'$fecha_devolucion'" : "NULL") . ")";
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

    public function actualizar($prestamo_id, $libro_id, $miembro_id, $fecha_prestamo, $fecha_devolucion = null) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "UPDATE `Prestamos` 
                       SET `libro_id`='$libro_id', `miembro_id`='$miembro_id', `fecha_prestamo`='$fecha_prestamo', `fecha_devolucion`=" . ($fecha_devolucion ? "'$fecha_devolucion'" : "NULL") . " 
                       WHERE `prestamo_id` = $prestamo_id";
            if (mysqli_query($con, $cadena)) {
                return $prestamo_id;
            } else {
                return $con->error;
            }
        } catch (Exception $th) {
            return $th->getMessage();
        } finally {
            $con->close();
        }
    }

    public function eliminar($prestamo_id) {
        try {
            $con = new ClaseConectar();
            $con = $con->ProcedimientoParaConectar();
            $cadena = "DELETE FROM `Prestamos` WHERE `prestamo_id`= $prestamo_id";
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
