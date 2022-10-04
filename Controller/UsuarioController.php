<?php

header("Content-type: application/json");

require('../Config/Conexion.php');
require('../Model/UsuarioModel.php');

$body = json_decode(file_get_contents("php://input"), true);

$usuario = new Usuario();

switch ($_GET["Api"]) {

    case 'Listar':
        $datos = $usuario->GetUsuario();
        echo json_encode($datos);
        break;

    case 'ListarById':
        $datos = $usuario->GetUsuarioById($body['Id']);
        echo json_encode($datos);
        break;
    case 'Agregar':
        $datos = $usuario->PostUsuario($body['NombreUsuario'], $body['FechaNacimiento'], $body['DNI']);
        echo json_encode("Datos Agregados Correctamente");
        break;

    case 'Actualizar':
        $datos = $usuario->UpdateUsuario($body['Id'], $body['NombreUsuario'], $body['FechaNacimiento'], $body['DNI']);
        echo json_encode("Datos Actualizados Correctamente");
        break;
    case 'Eliminar':
        $datos = $usuario->DeleteUsuario($body['Id']);
        echo json_encode("Datos Eliminados Correctamente");
        break;
}
