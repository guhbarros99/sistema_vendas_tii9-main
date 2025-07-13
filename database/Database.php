<?php

class Database
{
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            $db_host = "localhost";
            $db_port = "3306"; // <<<--- CORREÇÃO IMPORTANTE
            $db_name = "sistema_vendas_tii09";
            $db_user = "root";
            $db_pass = ""; // <<<--- SENHA CORRETA

            try {
                // Adicionamos a porta na string de conexão
                self::$instance = new PDO("mysql:host={$db_host};port={$db_port};dbname={$db_name};charset=utf8", $db_user, $db_pass);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Erro de conexão com o banco de dados: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}