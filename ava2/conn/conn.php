<?php

$host = "localhost";
$db = "viacep";
$user = "root";
$pass = "";

try {
    //Criando uma conexão PDO
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

    //Configurando o PDO para lançar exceções em caso de erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    //Captura de exceções PDO
    echo "Erro de conexão: " . $e->getMessage();
}
?>
