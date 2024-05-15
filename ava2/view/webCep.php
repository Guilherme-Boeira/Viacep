<?php session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Consulta de Endereço via CEP</title>
</head>
<body>
    <h1>Consulta de Endereço via CEP</h1>
    
    <!-- Formulário de Consulta -->
    <form action="../db/consulta_cep.php" method="POST">
        <label for="cep">CEP:</label>
        <input type="text" id="cep" name="cep" required>
        <button type="submit">Consultar</button>
    
    </form>

    <!--(1) Exibe endereco e salvar o endereco...-->
    <?php if (isset($_SESSION['endereco'])): ?>
    <?php $endereco = json_decode($_SESSION['endereco']); ?>
            <table>
                <thead>
                    <tr>
                        <th>CEP</th>
                        <th>Rua</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= htmlspecialchars($endereco->cep); ?></td>
                        <td><?= htmlspecialchars($endereco->logradouro); ?></td>
                        <td><?= htmlspecialchars($endereco->bairro); ?></td>
                        <td><?= htmlspecialchars($endereco->localidade); ?></td>
                        <td><?= htmlspecialchars($endereco->uf); ?></td>
                    </tr>
                    <form action="../db/saveCeo_db.php" method="POST">
                        <input type="hidden" name="cep" value="<?= ($endereco->cep); ?>">
                        <input type="hidden" name="logradouro" value="<?= htmlspecialchars($endereco->logradouro); ?>">
                        <input type="hidden" name="bairro" value="<?= htmlspecialchars($endereco->bairro); ?>">
                        <input type="hidden" name="cidade" value="<?= htmlspecialchars($endereco->localidade); ?>">
                        <input type="hidden" name="estado" value="<?= ($endereco->uf); ?>">
                        <button class="btnSalvar" type="submit">Salvar</button>
                    </form>
                </tbody>
            </table>
                    <?php else: ?>
                        <h2>Nenhum endereço disponível para exibir.</h2>
                    <?php endif; ?>
                    </tbody>
            </table>
    <!--(1) fim -->
    
    <!--(2) inicio tabela resgistrados-->
    <h2>Endereços Registrados</h2>
    <form action="" method="POST">
        Ordenar por:
        <select name="ordenacao" onchange="this.form.submit()">
            <option value="cidade ASC">Selecione</option>
            <option value="cidade ASC">Cidade (asc)</option>
            <option value="cidade DESC">Cidade (desc)</option>
            <option value="bairro ASC">Bairro (asc)</option>
            <option value="bairro DESC">Bairro (desc)</option>
            <option value="estado ASC">Estado (asc)</option>
            <option value="estado DESC">Estado (desc)</option>
        </select>
        <button type="submit" name="exibirReg">Consulta Registrados</button>
    </form>

    <table>
            <thead>
                    <tr>
                        <th>CEP</th>
                        <th>Rua</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                    </tr>
            </thead>
            <tbody>
                <?php include("../db/exibir_end.php");
                        foreach ($resultados as $cep): ?>
                        <tr>
                            <td><?= htmlspecialchars($cep['cep']); ?></td>
                            <td><?= htmlspecialchars($cep['rua']); ?></td>
                            <td><?= htmlspecialchars($cep['bairro']); ?></td>
                            <td><?= htmlspecialchars($cep['cidade']); ?></td>
                            <td><?= htmlspecialchars($cep['estado']); ?></td>
                        </tr>
                    <?php endforeach;?>
            </tbody>
    </table>
    <!--(2) fim -->

    <footer>
        <a class="link" href="https://github.com/Guilherme-b-damasio">Desenvolvido por: Guilherme Boeira</a>
    </footer>
</body>
</html>