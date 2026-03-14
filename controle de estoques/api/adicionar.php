<?php

include "conexao.php";

$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$quantidade = $_POST["quantidade"];

$sql = "INSERT INTO produtos(nome,categoria,quantidade)
VALUES ('$nome','$categoria','$quantidade')";

$conn->query($sql);

?>