<?php
 namespace Aula_12;
 class AlunoDAO { // classe DAO (Data Access Object) para manipulacao das funcoes do CRUD (create, read, update, delete)
    private $alunos = []; // array $alunos para armazenamento temporario dos objetos a serem manipulados antes de ser enviado ao banco de daods. foi criado vazio inicalmente.
        private $arquivo = "alunos.json"; // Cria o arquivo json para que os dados sejam armazenados 

        // construtor AlunoDAO --> carrega os dados do arquivo json ao iniciar a aplicação

    public function __construct() {
        if (file_exists($this->arquivo)) {
            // lê o conteudo do arquivo caso ele ja exista
            $conteudo = file_get_contents($this->arquivo); 
            //  atribui as informações do arquivo existente a variavel $conteudo 
            $dados = json_decode($conteudo, true);
            // converter o json em array associativo
            if ($dados){ // verifica se o array é nulo ou falso, caso seja valido e contenha conteudo, ele prossegue para a logica dentro da if
                foreach ($dados AS $id => $info){ // percorre o array $dados relacionando chave e valor
                    $this->alunos[$id] = new Aluno( // cria um novo objeto ja com as chaves e os valores associados
                        $info['id'],
                        $info['nome'],
                        $info['curso']
                        
                    );
                }
            }
        }
    }

    // metodo auxiliar --> para salvar o array $alunos no arquivo json 

    private function salvaremArquivo() {
        $dados = [];

        //transforma os objetos em arrays convencionais
        foreach ($this->alunos AS $id => $aluno) {
            $dados[$id] = [
                'id' => $aluno->getid(),
                'nome' => $aluno->getnome(),
                'curso' => $aluno->getcurso()
            ];
        }
        //converte para json formatado e grava o arquivo
        file_put_contents($this->arquivo, json_encode($dados, JSON_PRETTY_PRINT));

    }
    public  function criarAlunos(Aluno $aluno) { // metodo para criar um objeto no array alunos --> create
        $this->alunos[$aluno->getid()] = $aluno;
        $this->salvaremArquivo(); 
    }

    public  function lerAlunos() { // metodo para ler os dados de um objeto ja criado --> read
        return $this->alunos;
    }

    public  function atualizarAlunos($id, $novoNome, $novoCurso) { // metodo para atualizar os dados de um objeto ja criado --> update
        if (isset($this->alunos[$id])) {
            $this->alunos[$id]->setnome($novoNome);
            $this->alunos[$id]->setcurso($novoCurso);
        }
        $this->salvaremArquivo(); 
    }

    public  function excluirAlunos($id) { // metodo para excluir um objeto do array alunos --> delete
        unset($this->alunos[$id]);
        $this->salvaremArquivo(); 
    }
}
