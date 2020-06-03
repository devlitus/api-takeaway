<?php


namespace App\Domain\Clients\Repository;


use PDO;

class ClientList
{
    private PDO $connection;
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }
    public function listClient()
    {
        $statement = "SELECT * FROM clients";
        $result = $this->connection->prepare($statement);
        $result->execute();
        return $result->fetchAll();
    }
}
