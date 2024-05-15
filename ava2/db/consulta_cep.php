<?php
session_start();

function get_endereco($cep) {
    $cep = preg_replace("/[^0-9]/", "", $cep);
    $url = "http://viacep.com.br/ws/$cep/xml/";
    $xml = simplexml_load_file($url);
    return $xml;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["cep"])) { //se houver algum post e ele for o cep entao:
    $cep = $_POST["cep"];
    $endereco = get_endereco($cep); //chama a funcao da api

    // Armazenar o endereço na sessão
    $_SESSION['endereco'] = json_encode($endereco); // convertendo objeto para JSON para armazenamento


    header("Location: ../view/webCep.php"); 
    exit();
} else {
    echo "CEP não fornecido.";
}
?>
