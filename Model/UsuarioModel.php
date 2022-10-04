<?php

class Usuario extends Conexion
{

    public function GetUsuario()
    {

        $conexion = parent::Conexion();

        $sql = "SELECT * FROM usuarios";
        $sql = $conexion->prepare($sql);

        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetUsuarioById($Id)
    {

        $conexion = parent::Conexion();

        $sql = "SELECT * FROM usuarios WHERE Id = ?";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $Id);
        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function PostUsuario($NombreUsuario, $FechaNacimiento, $DNI)
    {

        $conexion = parent::Conexion();

        $sql = "INSERT INTO usuarios(NombreUsuario,FechaNacimiento,DNI) VALUE (?,?,?)";
        $sql = $conexion->prepare($sql);
        $sql->bindValue(1, $NombreUsuario);
        $sql->bindValue(2, $FechaNacimiento);
        $sql->bindValue(3, $DNI);
        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function UpdateUsuario($Id, $NombreUsuario, $FechaNacimiento, $DNI)
    {
        $conexion = parent::Conexion();

        $sql = "UPDATE usuarios SET NombreUsuario=?, FechaNacimiento=?, DNI=? WHERE Id = ?";
        $sql = $conexion->prepare($sql);

        $sql->bindValue(1, $NombreUsuario);
        $sql->bindValue(2, $FechaNacimiento);
        $sql->bindValue(3, $DNI);
        $sql->bindValue(4, $Id);
        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    public function DeleteUsuario($Id)
    {
        $conexion = parent::Conexion();

        $sql = "DELETE FROM usuarios WHERE Id = ? ";
        $sql = $conexion->prepare($sql);

        $sql->bindValue(1, $Id);
        $sql->execute();

        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);


    }
}
