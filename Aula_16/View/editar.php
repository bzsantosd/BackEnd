<?php

namespace Aula_16;

require_once __DIR__. '\\..\\Controller\\BebidaController.php'; // ajustado para Windows

$controller = new BebidaController(); // instancia o controller

$bebidaParaEditar = null; // bebida que sera editada
$nomeOriginal = '';  // nome original da bebida

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['acao'] ?? '') === 'atualizar') { // verifica se o formulario foi submetido para atualizar
    
    $nomeOriginal = $_POST['nomeOriginal'] ?? ''; // nome original da bebida
    $categoria    = $_POST['categoria'] ?? '';
    $volume       = $_POST['Volume'] ?? ''; 
    $valor        = $_POST['Valor'] ?? 0;  
    $qtde         = $_POST['qtde'] ?? 0;

    $controller->editar($nomeOriginal, $categoria, $volume, $valor, $qtde); // chama o metodo editar do controller
    
    header('Location: index.php'); // redireciona para a lista apos a edicao
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'])) { 
    $nomeOriginal = $_POST['nome'];
    $bebidaParaEditar = $controller->buscar($nomeOriginal);
    
    // Se a bebida não for encontrada, algo deu errado, redireciona.
    if (!$bebidaParaEditar) { // bebida nao encontrada
        header('Location: index.php'); // redireciona
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Editar Bebida</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        form { background: #f4f4f4; padding: 20px; border-radius: 8px; max-width: 400px; margin: 20px 0; }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 16px 0;
            display: inline-block;
            border: 1px solid #ffc5ecff;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            padding: 10px 20px; 
            background-color: #e39dd9ff; 
            color: black; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Editar Bebida: <?php echo htmlspecialchars($bebidaParaEditar->getNome()); ?></h1>
    
    <form method="POST">
        <input type="hidden" name="acao" value="atualizar"> 
        
        <input type="hidden" name="nomeOriginal" value="<?php echo htmlspecialchars($nomeOriginal); ?>"> 
        
        
        <label for="nome_display">Nome (Chave, não editável):</label>
        <input type="text" id="nome_display" value="<?php echo htmlspecialchars($bebidaParaEditar->getNome()); ?>" disabled> 
        

        <label for="categoria">Categoria:</label>
        <select name="categoria" id="categoria" required>
            <?php $currentCat = $bebidaParaEditar->getCategoria(); ?>
            <option value="Refrigerante" <?php if ($currentCat === 'Refrigerante') echo 'selected'; ?>>Refrigerante</option>
            <option value="Cerveja" <?php if ($currentCat === 'Cerveja') echo 'selected'; ?>>Cerveja</option>
            <option value="Vinho" <?php if ($currentCat === 'Vinho') echo 'selected'; ?>>Vinho</option>
            <option value="Destilado" <?php if ($currentCat === 'Destilado') echo 'selected'; ?>>Destilado</option>
            <option value="Água" <?php if ($currentCat === 'Água') echo 'selected'; ?>>Água</option>
            <option value="Suco" <?php if ($currentCat === 'Suco') echo 'selected'; ?>>Suco</option>
            <option value="Energético" <?php if ($currentCat === 'Energético') echo 'selected'; ?>>Energético</option>

        </select>
        
        <label for="volume">Volume:</label>
        <input type="text" name="Volume" id="volume" value="<?php echo htmlspecialchars($bebidaParaEditar->getVolume()); ?>" required>
        

        <label for="valor">Valor:</label>
        <input type="number" name="Valor" id="valor" step="0.01" value="<?php echo htmlspecialchars($bebidaParaEditar->getValor()); ?>" required>
        

        <label for="qtde">Quantidade:</label>
        <input type="number" name="qtde" id="qtde" value="<?php echo htmlspecialchars($bebidaParaEditar->getQtde()); ?>" required>
        

        <button type="submit">Salvar Alterações</button>
    </form>
    
    <p><a href="index.php">Voltar para a lista</a></p>
</body>
</html>