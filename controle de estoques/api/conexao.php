<?php

$host = "localhost";
$usuario = "seu_usuario";
$senha = "sua_senha";
$banco = "seu_banco";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro na conexão com o banco"]);
    exit;
}

$conn->set_charset("utf8mb4");

?>
