<?php

include "conexao.php";

header("Content-Type: application/json");

$nome = $_POST["nome"] ?? "";
$categoria = $_POST["categoria"] ?? "";
$quantidade = $_POST["quantidade"] ?? "";

if (empty($nome) || empty($categoria) || empty($quantidade)) {
    http_response_code(400);
    echo json_encode(["erro" => "Campos obrigatórios não preenchidos"]);
    exit;
}

if (!is_numeric($quantidade) || (int)$quantidade < 0) {
    http_response_code(400);
    echo json_encode(["erro" => "Quantidade inválida"]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO produtos(nome, categoria, quantidade) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $nome, $categoria, $quantidade);

if ($stmt->execute()) {
    http_response_code(201);
    echo json_encode(["sucesso" => "Produto adicionado com sucesso"]);
} else {
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao adicionar produto"]);
}

$stmt->close();

?>
