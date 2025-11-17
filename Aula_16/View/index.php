<?php

namespace Aula_16;
require_once __DIR__. '\\..\\Controller\\BebidaController.php';
$controller = new BebidaController();

// 1. Definição das Categorias
$categorias = ["Refrigerante", "Cerveja", "Vinho", "Destilado", "Água", "Suco", "Energético"];

// 2. Processamento das Ações POST (Criar, Deletar, Atualizar)
if ($_SERVER ['REQUEST_METHOD'] === 'POST'){
    $acao = $_POST['acao'] ?? '';
    
    if ($acao === 'criar'){
        $controller->criar(
            $_POST['nome'],
            $_POST['categoria'],
            $_POST['Volume'],
            $_POST['Valor'],
            $_POST['qtde']
        );
    } elseif ($acao === 'deletar'){
        $controller->deletar($_POST['nome']);
    } elseif ($acao === 'atualizar'){ 
        $controller->atualizar(
            $_POST['nome_antigo'],
            $_POST['nome'], // Nome Novo
            $_POST['categoria'],
            $_POST['Volume'],
            $_POST['Valor'],
            $_POST['qtde']
        );
        // Redireciona para atualizar a lista e limpar o estado de edição
        header('Location: index.php');
        exit;
    }
}

// 3. Leitura dos Dados e Lógica de Carregamento para Edição (GET)
$bebidas = $controller->ler();
$bebida_editando_nome = $_GET['editar'] ?? null; 
$bebida_selecionada = null;

if ($bebida_editando_nome && isset($bebidas[$bebida_editando_nome])) {
    $bebida_selecionada = $bebidas[$bebida_editando_nome];
}

// Variáveis para preencher o formulário
$form_acao = $bebida_selecionada ? 'atualizar' : 'criar';
$form_titulo = $bebida_selecionada ? 'Editar Bebida: ' . htmlspecialchars($bebida_selecionada->getNome()) : 'Cadastrar Nova Bebida';
$nome_valor = $bebida_selecionada ? $bebida_selecionada->getNome() : '';
$categoria_valor = $bebida_selecionada ? $bebida_selecionada->getCategoria() : '';
$volume_valor = $bebida_selecionada ? $bebida_selecionada->getVolume() : '';
$valor_valor = $bebida_selecionada ? $bebida_selecionada->getValor() : '';
$qtde_valor = $bebida_selecionada ? $bebida_selecionada->getQtde() : '';
$nome_antigo_input = $bebida_selecionada ? '<input type="hidden" name="nome_antigo" value="' . htmlspecialchars($bebida_selecionada->getNome()) . '">' : '';
$botao_texto = $bebida_selecionada ? 'Salvar Edição' : 'Cadastrar';
$botao_cor = $bebida_selecionada ? 'black' : '#005c00';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Bebidas</title>
    <style>
        .container {
            display: flex;
            gap: 20px;
            flex-direction: column;
        }
        .form-area {
            flex: 1;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .list-area {
            flex: 2;
        }
        input[type="text"], input[type="number"], select {
            padding: 8px;
            margin-bottom: 10px;
            display: block;
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h1>Gerenciamento de Estoque de Bebidas</h1>
    
    <div class="container">
        
        <div class="form-area" style="border-color: <?php echo $bebida_selecionada ? 'black' : '#ccc'; ?>;">
            <h2><?php echo $form_titulo; ?></h2>
            <form method="POST">
                <input type="hidden" name="acao" value="<?php echo $form_acao; ?>">
                <?php echo $nome_antigo_input; ?>
                
                <label>Nome:</label>
                <input type="text" name="nome" placeholder="Nome de bebida:" value="<?php echo htmlspecialchars($nome_valor); ?>" required>
                
                <label>Categoria:</label>
                <select name="categoria" required>
                    <option value="">Selecione a Categoria</option>
                    <?php foreach ($categorias as $cat): ?>
                        <option value="<?php echo $cat; ?>" <?php echo ($categoria_valor === $cat) ? 'selected' : ''; ?>>
                            <?php echo $cat; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                
                <label>Volume:</label>
                <input type="text" name="Volume" placeholder="Volume (ex:300ml):" value="<?php echo htmlspecialchars($volume_valor); ?>" required>
                
                <label>Valor (R$):</label>
                <input type="number" name="Valor" step="0.01" placeholder="Valor em Reais (R$):" value="<?php echo htmlspecialchars($valor_valor); ?>" required>
                
                <label>Quantidade em estoque:</label>
                <input type="number" name="qtde" placeholder="Quatidade em estoque:" value="<?php echo htmlspecialchars($qtde_valor); ?>" required>
                
                <button type="submit" style="padding: 10px 20px; background-color: <?php echo $botao_cor; ?>; color: white; border: none; border-radius: 4px; cursor: pointer; margin-top: 10px;"><?php echo $botao_texto; ?></button>
                
                <?php if ($bebida_selecionada): ?>
                    <a href="index.php" style="padding: 10px; background-color: #ccc; color: black; border-radius: 4px; cursor: pointer; text-decoration: none;">Cancelar Edição</a>
                <?php endif; ?>
            </form>
        </div>

        <div class="list-area">
            <h2>Bebidas Cadastradas</h2>
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Volume</th>
                        <th>Valor (R$)</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bebidas as $bebida): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($bebida->getNome()); ?></td>
                        <td><?php echo htmlspecialchars($bebida->getCategoria()); ?></td>
                        <td><?php echo htmlspecialchars($bebida->getVolume()); ?></td>
                        <td>R$ <?php echo number_format($bebida->getValor(), 2, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($bebida->getQtde()); ?></td>
                        
                        <td>
                            <a href="?editar=<?php echo urlencode($bebida->getNome()); ?>" style="background-color: #1c4c96; color: white; border-radius: 4px; cursor: pointer; padding: 5px 8px; text-decoration: none; margin-right: 5px;">Editar</a>
                            
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="acao" value="deletar">
                                <input type="hidden" name="nome" value="<?php echo htmlspecialchars($bebida->getNome()); ?>">
                                <button type="submit" style="background-color: #bb0b0b; color: white; border: none; border-radius: 4px; cursor: pointer; padding: 5px;">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html> 

