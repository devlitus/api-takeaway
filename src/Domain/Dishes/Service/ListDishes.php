<?php


namespace App\Domain\Dishes\Service;


use App\Domain\Dishes\Repository\DishesList;

class ListDishes
{
    /**
     * @var DishesList
     */
    private DishesList $dishesList;

    /**
     * ListDishes constructor.
     * @param DishesList $dishesList
     */
    public function __construct(DishesList $dishesList)
    {
        $this->dishesList = $dishesList;
    }

    /**
     * @return array
     */
    public function dishesService(): array
    {
        return $this->dishesList->dishesRepository();
    }
}