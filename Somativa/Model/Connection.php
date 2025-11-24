<?php
namespace BibliotecaEscolar;
use PDO;
use PDOException;

class Connection {
    private static $instance = null;
    
//Garante que exista apenas UMA conexão com o banco durante a execução
    public static function getInstance() {
        if (!self::$instance) {
            try {
                // Configurações do Banco
                $host = 'localhost';
                $dbname = 'biblioteca_escolar';
                $user = 'root';
                $pass = '1234';

                // Conecta ao MySQL
                self::$instance = new PDO(
                    "mysql:host=$host;charset=utf8",
                    $user,
                    $pass
                );

                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Criação do Banco
                self::$instance->exec("CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
                self::$instance->exec("USE $dbname");

            } catch (PDOException $e) {
                die("Erro ao conectar ao MySQL: " . $e->getMessage());
            }  
        }
        return self::$instance;
    }
}
?>