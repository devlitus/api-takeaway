<?php


namespace App\Domain\Categories\Repository;


use App\Domain\Categories\Data\CategoryData;
use PDO;

class CategoryCreate
{
    /**
     * @var PDO
     */
    private PDO $connection;

    /**
     * CategoryCreate constructor.
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param array $data
     * @return false|string|string[]
     */
    public function categoryCreate(array $data)
    {
        try {
            $category = new CategoryData();
            $category->category = filter_var($data['category'], FILTER_SANITIZE_STRING);
            $category->description = filter_var($data['description'], FILTER_SANITIZE_STRING);
            $row = [
                'category' => $category->category,
                'description' => $category->description
            ];
            $statement = "INSERT INTO categories SET category=:category, descrption=:description";
            $this->connection->prepare($statement)->execute($row);
            return ['category' => 'category create'];
        } catch (\PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}