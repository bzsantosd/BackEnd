<?php

namespace BibliotecaEscolar;

require_once __DIR__. '\\..\\Controller\\LivroController.php'; 
$controller = new LivroController(); 

$livroParaEditar = null; 
$tituloOriginal = ''; 


if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['acao'] ?? '') === 'atualizar') { 
    $tituloOriginal = $_POST['tituloOriginal'] ?? ''; 
    $autor          = $_POST['autor'] ?? '';
    $ano            = $_POST['ano'] ?? 0; 
    $genero         = $_POST['genero'] ?? '';  
    $quantidade     = $_POST['quantidade'] ?? 0;

    $controller->editar($tituloOriginal, $autor, $ano, $genero, $quantidade); 
    
    header('Location: index.php'); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulo'])) { 
    $tituloOriginal = $_POST['titulo'];
    $livroParaEditar = $controller->buscar($tituloOriginal);
    
    if (!$livroParaEditar) { 
        header('Location: index.php'); 
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}

$generos = ["Ficção", "Romance", "Aventura", "Fantasia", "Suspense", "Terror", "Biografia", "História", "Ciência", "Poesia", "Drama", "Comédia"];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro - Biblioteca Escolar</title>
    <style>
        body { 
            font-family: sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        
        .container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            max-width: 500px;
            width: 100%;
            padding: 30px;
        }
        
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { color: #333; font-size: 1.8em; margin: 0; }
        
        .book-title {
            background: #444;
            color: white;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; color: #555; font-weight: bold; font-size: 0.9em; }
        
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        
        input:disabled { background: #e9ecef; color: #6c757d; }
        
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #2c3e50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 10px;
        }
        button[type="submit"]:hover { background: #1a252f; }
        
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #666;
            text-decoration: none;
            font-size: 0.9em;
        }
        .back-link:hover { text-decoration: underline; }
        
        .info-box {
            background: #e3f2fd;
            color: #00555A;
            padding: 10px;
            border-radius: 4px;
            font-size: 0.85em;
            margin-bottom: 20px;
            border-left: 4px solid #008080;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="book-icon"></div>
            <h1>Editar Livro</h1>
        </div>
        
        <div class="book-title">
            <?php echo htmlspecialchars($livroParaEditar->getTitulo()); ?>
        </div>
        
        <div class="info-box">
            <strong> Observação:</strong> O título do livro não pode ser alterado, pois é usado como identificador único no sistema.
        </div>
        
        <form method="POST">
            <input type="hidden" name="acao" value="atualizar"> 
            <input type="hidden" name="tituloOriginal" value="<?php echo htmlspecialchars($tituloOriginal); ?>"> 
            
            <div class="form-group">
                <label for="titulo_display" class="label-disabled">Título (Chave, não editável):</label>
                <input type="text" id="titulo_display" value="<?php echo htmlspecialchars($livroParaEditar->getTitulo()); ?>" disabled> 
            </div>

            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" name="autor" id="autor" value="<?php echo htmlspecialchars($livroParaEditar->getAutor()); ?>" placeholder="Digite o nome do autor" required>
            </div>
            
            <div class="form-group">
                <label for="ano">Ano de Publicação:</label>
                <input type="number" name="ano" id="ano" min="1000" max="<?php echo date('Y'); ?>" value="<?php echo htmlspecialchars($livroParaEditar->getAno()); ?>" placeholder="Ex: 2024" required>
            </div>

            <div class="form-group">
                <label for="genero">Gênero Literário:</label>
                <select name="genero" id="genero" required>
                    <?php $currentGen = $livroParaEditar->getGenero(); ?>
                    <?php foreach ($generos as $gen): ?>
                        <option value="<?php echo $gen; ?>" <?php if ($currentGen === $gen) echo 'selected'; ?>>
                            <?php echo $gen; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade Disponível (exemplares):</label>
                <input type="number" name="quantidade" id="quantidade" min="0" value="<?php echo htmlspecialchars($livroParaEditar->getQuantidade()); ?>" placeholder="Número de exemplares" required>
            </div>

            <div class="button-group">
                <button type="submit">Salvar Alterações</button>
            </div>
        </form>
        
        <a href="index.php" class="back-link">Voltar para a lista</a>
    </div>
</body>
</html>