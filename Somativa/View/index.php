<?php

namespace Aula_16;

use BibliotecaEscolar\LivroController;

require_once __DIR__. '\\..\\Controller\\LivroController.php';
$controller = new LivroController();

$generos = ["Romance", "Ficção Científica", "Fantasia", "Terror", "Suspense", "Aventura", "Biografia", "História", "Poesia", "Drama", "Comédia", "Autoajuda", "Técnico", "Infantil", "Juvenil"];

// 1. Inicializa a variável
$mensagem_sucesso = '';

// 2. Verifica se chegou alguma mensagem via GET (pela URL)
if (isset($_GET['msg'])) {
    $mensagem_sucesso = $_GET['msg'];
}

// 3. Processamento das Ações POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'] ?? '';
    $msg_temp = ''; // Variável temporária para a mensagem
    
    if ($acao === 'criar') {
        try {
            $controller->criar($_POST['titulo'], $_POST['autor'], $_POST['ano'], $_POST['genero'], $_POST['quantidade']);
            $msg_temp = 'Livro cadastrado com sucesso!';
        } catch (\Exception $e) {
            $msg_temp = 'Erro ao cadastrar livro. Verifique se o título já existe.';
        }
    } elseif ($acao === 'deletar') {
        try {
            $controller->deletar($_POST['titulo']);
            $msg_temp = 'Livro excluído com sucesso!';
        } catch (\Exception $e) {
            $msg_temp = 'Erro ao excluir o livro.';
        }
    } elseif ($acao === 'atualizar') { 
        try {
            $controller->atualizar($_POST['titulo_antigo'], $_POST['titulo'], $_POST['autor'], $_POST['ano'], $_POST['genero'], $_POST['quantidade']);
            $msg_temp = 'Livro atualizado com sucesso!';
        } catch (\Exception $e) {
            $msg_temp = 'Erro ao atualizar livro.';
        }
    }

    // REDIRECIONAMENTO COM A MENSAGEM
    // Isso limpa o POST e exibe a mensagem via GET
    if ($msg_temp) {
        header('Location: index.php?msg=' . urlencode($msg_temp));
        exit;
    }
}

// 4. Carregamento dos dados (após redirecionamento ou carregamento normal)
$livros = $controller->ler();
$livro_editando_titulo = $_GET['atualizar'] ?? null; 
$livro_selecionado = null;

if ($livro_editando_titulo && !empty($livros)) {
    foreach ($livros as $livro) {
        if ($livro->getTitulo() === $livro_editando_titulo) {
            $livro_selecionado = $livro;
            break;
        }
    }
}

$form_acao = $livro_selecionado ? 'atualizar' : 'criar';
$form_titulo = $livro_selecionado ? 'Editar Livro: ' . htmlspecialchars($livro_selecionado->getTitulo()) : 'Cadastrar Novo Livro';
$titulo_valor = $livro_selecionado ? $livro_selecionado->getTitulo() : '';
$autor_valor = $livro_selecionado ? $livro_selecionado->getAutor() : '';
$ano_valor = $livro_selecionado ? $livro_selecionado->getAno() : '';
$genero_valor = $livro_selecionado ? $livro_selecionado->getGenero() : '';
$quantidade_valor = $livro_selecionado ? $livro_selecionado->getQuantidade() : '';
$titulo_antigo_input = $livro_selecionado ? '<input type="hidden" name="titulo_antigo" value="' . htmlspecialchars($livro_selecionado->getTitulo()) . '">' : '';
$botao_texto = $livro_selecionado ? 'Salvar Edição' : 'Cadastrar';
$botao_cor = $livro_selecionado ? '#00555A' : '#008080';

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Livros - Biblioteca Escolar</title>
    <style>
        body { font-family: sans-serif; background-color: #ecf0f1; margin: 0; padding: 20px; color: #333; }
        
        .header { text-align: center; margin-bottom: 30px; }
        .header h1 { margin: 0; color: #333; }
        
        .container { max-width: 1200px; margin: 0 auto; display: flex; flex-direction: column; gap: 20px; }
        
        .mensagem-sucesso {
            background: #00555A; color: white; padding: 15px; border-radius: 4px; text-align: center;
            font-weight: bold; margin-bottom: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            /* Animação simples */
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-area, .list-area {
            background: white; padding: 25px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .form-area.editing { border: 2px solid #00555A; }

        h2 { margin-top: 0; font-size: 1.5em; border-bottom: 1px solid #eee; padding-bottom: 10px; }

        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; font-size: 0.9em; }
        
        input, select {
            width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box;
        }

        button, .btn {
            padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; color: white;
            font-size: 0.95em; text-decoration: none; display: inline-block;
        }
        button[type="submit"] { background-color: var(--btn-color, #6c757d); }
        button[type="submit"]:hover { opacity: 0.9; }
        
        .btn-cancelar { background-color: #7f8c8d; margin-left: 10px; }
        .btn-editar { background-color: #008080; padding: 6px 12px; font-size: 0.85em; }
        .btn-excluir { background-color: #7f8c8d; padding: 6px 12px; font-size: 0.85em; }

        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { text-align: left; background: #f8f9fa; padding: 12px; font-weight: 600; color: #555; }
        td { padding: 12px; border-bottom: 1px solid #eee; }
        tr:last-child td { border-bottom: none; }
        tr:hover { background-color: #f9f9f9; }
        tr.editing { background-color: #eaf2f8; }

        .empty-state { text-align: center; color: #7f8c8d; padding: 20px; }

        @media (max-width: 768px) {
            th, td { padding: 8px; font-size: 0.9em; }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Catálogo de Livros</h1>
        <p>Sistema de Gerenciamento - Biblioteca Escolar</p>
    </div>
    
    <div class="container">
        
        <?php if (!empty($mensagem_sucesso)): ?>
            <div class="mensagem-sucesso">
                <?php echo htmlspecialchars($mensagem_sucesso); ?>
            </div>
            <script>
                // Remove o parâmetro 'msg' da URL visualmente sem recarregar
                if (window.history.replaceState) {
                    const url = new URL(window.location);
                    url.searchParams.delete('msg');
                    window.history.replaceState(null, '', url);
                }
            </script>
        <?php endif; ?>
        
        <div class="form-area <?php echo $livro_selecionado ? 'editing' : ''; ?>">
            <h2><?php echo $form_titulo; ?></h2>
            <form method="POST">
                <input type="hidden" name="acao" value="<?php echo $form_acao; ?>">
                <?php echo $titulo_antigo_input; ?>
                
                <div class="form-group">
                    <label>Título do Livro *</label>
                    <input type="text" name="titulo" placeholder="Digite o título do livro" value="<?php echo htmlspecialchars($titulo_valor); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Autor *</label>
                    <input type="text" name="autor" placeholder="Digite o nome do autor" value="<?php echo htmlspecialchars($autor_valor); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Ano de Publicação *</label>
                    <input type="number" name="ano" placeholder="Ex: 2024" min="1000" max="2100" value="<?php echo htmlspecialchars($ano_valor); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Gênero Literário *</label>
                    <select name="genero" required>
                        <option value="">Selecione o gênero</option>
                        <?php foreach ($generos as $gen): ?>
                            <option value="<?php echo $gen; ?>" <?php echo ($genero_valor === $gen) ? 'selected' : ''; ?>>
                                <?php echo $gen; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Quantidade de Exemplares *</label>
                    <input type="number" name="quantidade" placeholder="Quantidade disponível" min="0" value="<?php echo htmlspecialchars($quantidade_valor); ?>" required>
                </div>
                
                <div class="button-group">
                    <button type="submit" style="--btn-color: <?php echo $botao_cor; ?>;">
                        <?php echo $botao_texto; ?>
                    </button>
                    
                    <?php if ($livro_selecionado): ?>
                        <a href="index.php" class="btn btn-cancelar">Cancelar Edição</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="list-area">
            <h2>Livros Cadastrados</h2>
            <?php if (empty($livros)): ?>
                <div class="empty-state">
                    <p>Nenhum livro cadastrado ainda.</p>
                    <p style="font-size: 0.9em;">Comece adicionando o primeiro livro ao catálogo!</p>
                </div>
            <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Ano</th>
                        <th>Gênero</th>
                        <th>Exemplares</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($livros as $livro): ?>
                    <tr class="<?php echo ($livro_selecionado && $livro->getTitulo() === $livro_selecionado->getTitulo()) ? 'editing' : ''; ?>">
                        <td><strong><?php echo htmlspecialchars($livro->getTitulo()); ?></strong></td>
                        <td><?php echo htmlspecialchars($livro->getAutor()); ?></td>
                        <td><?php echo htmlspecialchars($livro->getAno()); ?></td>
                        <td><?php echo htmlspecialchars($livro->getGenero()); ?></td>
                        <td><?php echo htmlspecialchars($livro->getQuantidade()); ?></td>
                        <td>
                            <a href="?atualizar=<?php echo urlencode($livro->getTitulo()); ?>" class="btn-editar" style="text-decoration: none; color: white; background-color: #00555A; padding: 6px 12px; border-radius: 4px; border: none; display: inline-block; font-family: sans-serif;">Editar</a>
                            
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="acao" value="deletar">
                                <input type="hidden" name="titulo" value="<?php echo htmlspecialchars($livro->getTitulo()); ?>">
                                <button type="submit" class="btn-excluir">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>