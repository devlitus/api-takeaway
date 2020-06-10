<?php


namespace App\Domain\Categories\Repository;


use PDO;

class CategoryList
{
    /**
     * @var PDO
     */
    private PDO $connection;

    /**
     * CategoryList constructor.
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return array
     */
    public function categoryList(): array
    {
        $statement = "SELECT * FROM categories;";
        $result = $this->connection->prepare($statement);
        $result->execute();
        return $result->fetchAll();
    }
}