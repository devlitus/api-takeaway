<?php


namespace App\Domain\Dishes\Service;

use App\Domain\Dishes\Repository\DishesCreator;
use App\Exception\ValidationException;

class CreatorDishes
{
    /**
     * @var DishesCreator
     */
    private DishesCreator $repository;

    /**
     * CreatorDishes constructor.
     * @param DishesCreator $dishesList
     */
    public function __construct(DishesCreator $dishesList)
    {
        $this->repository = $dishesList;
    }

    /**
     * @param array $data
     * @return array|string[]
     */
    public function creatorDishes(array $data)
    {
        try {
            $this->validateNewDishes($data);
            $this->repository->dishesCreator($data);
            return ['dishes' => 'dishes create'];
        } catch (\Throwable $t) {
            return ['error' => $t->getMessage(), 'code' => $t->getCode()];
        }
    }

    /**
     * @param array $data
     */
    public function validateNewDishes(array $data)
    {
        $errors = [];
        if (empty($data['title'])) {
            $errors['title'] = 'Input require';
        }
        if (empty($data['price'])) {
            $errors['price'] = 'Input require';
        }
        if (empty($data['idCategory'])) {
            $errors['idCategory'] = 'Input require';
        }
        if ($errors) {
            throw new ValidationException("Please check your inputs ", $errors, 500);
        }
    }
}