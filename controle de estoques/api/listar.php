<?php

include "conexao.php";

header("Content-Type: application/json");

$result = $conn->query("SELECT * FROM produtos ORDER BY nome ASC");

if (!$result) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao buscar produtos"]);
    exit;
}

$produtos = [];

while ($row = $result->fetch_assoc()) {
    $produtos[] = $row;
}

echo json_encode($produtos);

?>
