<?php

$host = "localhost";
$usuario = "seu_usuario";
$senha = "sua_senha";
$banco = "seu_banco";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão com o banco");
}

?>