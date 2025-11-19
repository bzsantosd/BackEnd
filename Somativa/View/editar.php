<?php

namespace BibliotecaEscolar;

require_once __DIR__. '\\..\\Controller\\LivroController.php'; // ajustado para Windows

$controller = new LivroController(); // instancia o controller

$livroParaEditar = null; // livro que sera editado
$tituloOriginal = '';  // titulo original do livro

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['acao'] ?? '') === 'atualizar') { // verifica se o formulario foi submetido para atualizar
    
    $tituloOriginal = $_POST['tituloOriginal'] ?? ''; // titulo original do livro
    $autor          = $_POST['autor'] ?? '';
    $ano            = $_POST['ano'] ?? 0; 
    $genero         = $_POST['genero'] ?? '';  
    $quantidade     = $_POST['quantidade'] ?? 0;

    $controller->editar($tituloOriginal, $autor, $ano, $genero, $quantidade); // chama o metodo editar do controller
    
    header('Location: index.php'); // redireciona para a lista apos a edicao
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulo'])) { 
    $tituloOriginal = $_POST['titulo'];
    $livroParaEditar = $controller->buscar($tituloOriginal);
    
    // Se o livro não for encontrado, algo deu errado, redireciona.
    if (!$livroParaEditar) { // livro nao encontrado
        header('Location: index.php'); // redireciona
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}

// Definição dos Gêneros Literários
$generos = ["Ficção", "Romance", "Aventura", "Fantasia", "Suspense", "Terror", "Biografia", "História", "Ciência", "Poesia", "Drama", "Comédia"];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Livro - Biblioteca Escolar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #616161 100%, #ffffff 0%);
            padding: 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            max-width: 600px;
            width: 100%;
            padding: 40px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .header h1 {
            color: #333;
            font-size: 2em;
            margin-bottom: 10px;
        }
        
        .header .book-icon {
            font-size: 3em;
            margin-bottom: 10px;
        }
        
        .book-title {
            background: linear-gradient(135deg, #616161 100%, #ffffff 0%);
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 30px;
            text-align: center;
            font-size: 1.3em;
            font-weight: bold;
        }
        
        form { 
            background: #f9f9f9; 
            padding: 30px; 
            border-radius: 12px;
            border: 2px solid #667eea;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
            font-size: 0.95em;
        }
        
        .label-disabled {
            color: #999;
        }
        
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 1em;
            transition: all 0.3s ease;
            background: white;
        }
        
        input[type="text"]:focus, input[type="number"]:focus, select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        input:disabled {
            background-color: #f0f0f0;
            color: #999;
            cursor: not-allowed;
            border-color: #e0e0e0;
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        button[type="submit"] {
            flex: 1;
            padding: 14px 20px; 
            background: linear-gradient(135deg, #616161 100%, #ffffff 0%);
            color: white; 
            border: none; 
            border-radius: 8px; 
            cursor: pointer;
            font-weight: bold;
            font-size: 1.05em;
            transition: all 0.3s ease;
        }
        
        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }
        
        button[type="submit"]:active {
            transform: translateY(0);
        }
        
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #757575;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-align: center;
            width: 100%;
        }
        
        .back-link:hover {
            background-color: #616161;
            transform: translateY(-2px);
        }
        
        .info-box {
            background: #e3f2fd;
            border-left: 4px solid #1976d2;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 25px;
            font-size: 0.9em;
            color: #555;
        }
        
        .info-box strong {
            color: #1976d2;
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
                <input type="number" name="ano" id="ano" min="1000" max="<?php echo date('Y'); ?>" value="<?php echo htmlspecialchars($livroParaEditar->getAno()); ?>" placeholder="Ex: 2023" required>
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