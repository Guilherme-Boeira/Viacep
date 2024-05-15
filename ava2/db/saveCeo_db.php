<?php
session_start(); 
include("../conn/conn.php");

$cep = $_POST["cep"];
$cep = str_replace('-', '', $cep);// retira o - e coloca um vazio ""
$logradouro = $_POST["logradouro"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];



try {
    $sql = "INSERT INTO endereco (CEP, RUA, BAIRRO, CIDADE, ESTADO) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);//prepare statement para evitar injecoes

    // Executando a declaração SQL com os valores definidos
    $stmt->execute([$cep, $logradouro, $bairro, $cidade, $estado]);

    header("Location: ../view/webCep.php");
} catch (PDOException $e) {
    // Captura de exceções PDO
    echo "Erro ao inserir dados: " . $e->getMessage();
}
?>
