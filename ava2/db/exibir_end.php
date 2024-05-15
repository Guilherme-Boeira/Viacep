<?php
include("../conn/conn.php"); 

function buscaDB($pdo, $ordenacao) {
    try {

        if (empty($ordenacao)) { //se variavel estiver vazia, declara um padrao para pesquisa
            $ordenacao = 'bairro ASC';
        }

        $sql = "SELECT * FROM endereco ORDER BY $ordenacao"; //script sql
        $stmt = $pdo->query($sql); //query de busca
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC); //fecth que adiciona todas as consultas em um array

        return $resultados;
    } catch (PDOException $e) {
        // Captura de exceções PDO
        echo "Erro ao buscar dados " . $e->getMessage();
    }  
}


if (isset($_POST['ordenacao'])) {//se houver post de ordenacao
    // Obtém a opção de ordenação selecionada
    $ordenacao = $_POST['ordenacao'];
} else {

    $ordenacao = '';
}


$resultados = buscaDB($pdo, $ordenacao);


if (isset($_POST["exibirReg"])) { //se houver clique no botao consultas
    $resultados = buscaDB($pdo, $ordenacao);
}
?>
