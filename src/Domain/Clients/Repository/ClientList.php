<?php


namespace App\Domain\Clients\Repository;


use PDO;

class ClientList
{
    /**
     * @var PDO
     */
    private PDO $connection;

    /**
     * ClientList constructor.
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return array
     */
    public function listClient(): array
    {
        $statement = "SELECT * FROM clients";
        $result = $this->connection->prepare($statement);
        $result->execute();
        return $result->fetchAll();
    }
}
