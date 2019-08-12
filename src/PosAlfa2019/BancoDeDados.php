<?php

declare(strict_types=1);

namespace PosAlfa;

use PosAlfa\Abstraction\BancoDeDados as AbstractionBancoDeDados;

class BancoDeDados implements AbstractionBancoDeDados
{
    private function connect(string $user, string $pass, string $host, string $port, string $dbname): \PDO
    {
        return new \PDO("
            mysql:host=$host;
            port=$port;
            dbname=$dbname", 
            $user, 
            $pass);
    }

    private function databaseConnection()
    {
        $dbParams = include "../config/connection.php";
        $dbParams .= $dbParams['database'];
        return $this->connect($dbParams['user'], $dbParams['pass'], $dbParams['host'], $dbParams['port'], $dbParams['dbname']);
    }

    private function prepare(\PDO $dbh, string $sql): \PDOStatement
    {
        return $this->databaseConnection->prepare($sql);
    }

    public function findAllUsuarios()
    {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->prepare($this->connect, $sql);
        if ($stmt->execute()) {
            return $stmt->fetchAll();
        }

        throw new \DataBaseException("Erro ao buscar dados do banco de dados!");
    }
}

