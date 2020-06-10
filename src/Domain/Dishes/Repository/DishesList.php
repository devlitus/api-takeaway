<?php


namespace App\Domain\Dishes\Repository;


use PDO;

class DishesList
{
    /**
     * @var PDO
     */
    private PDO $connection;

    /**
     * DishesList constructor.
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return array
     */
    public function dishesRepository(): array
    {
        $statement = "SELECT * FROM dishes;";
        $result = $this->connection->prepare($statement);
        $result->execute();
        return $result->fetchAll();
    }
}