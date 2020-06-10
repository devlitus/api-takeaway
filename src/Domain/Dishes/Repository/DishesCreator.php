<?php


namespace App\Domain\Dishes\Repository;


use App\Domain\Dishes\Data\DishesData;
use App\Util\UploadFile;
use PDO;

class DishesCreator
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function dishesCreator(array $data)
    {
        $directory = '/var/www/server.net/htdocs/api-takeaway/src/upload/dishes';
        $dishes = new DishesData();
        $dishes->title = filter_var($data['title'], FILTER_SANITIZE_STRING);
        $dishes->description = filter_var($data['description'], FILTER_SANITIZE_STRING);
        $dishes->price = $data['price'];
        $dishes->id_category = filter_var($data['idCategory'], FILTER_SANITIZE_NUMBER_INT);
        (empty($data['activate'])) ? $dishes->activate = 'not' : $dishes->activate = filter_var($data['activate'], FILTER_SANITIZE_STRING);
        if (empty($data['image'])) {
            $dishes->image = 'default.jpg';
        } else {
            try {
                $image = new UploadFile($data['image'], $directory);
                $img = $image->moveUploadedFile();
                $dishes->image = $img;
            } catch (\Exception $e) {
                $data = ['error' => $e->getMessage()];
                return $data;
            }
        }
        $row = [
            'title' => $dishes->title,
            'description' => $dishes->description,
            'price' => $dishes->price,
            'activate' => $dishes->activate,
            'idCategory' => $dishes->id_category,
            'image' => $dishes->image,
        ];
        $statement = "INSERT INTO dishes SET 
                        title=:title,
                        description=:description,
                        price=:price,
                        activate=:activate,
                        id_category=:idCategory,
                        image=:image;";
        $statement = $this->connection->prepare($statement)->execute($row);
        return $this->connection->lastInsertId();
    }
}