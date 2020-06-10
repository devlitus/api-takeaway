<?php


namespace App\Domain\Dishes\Data;


class DishesData
{
    /**
     * @var int
     */
    public int $id;
    /**
     * @var string
     */
    public string $title;
    /**
     * @var string
     */
    public string $description;
    public $image;
    /**
     * @var float
     */
    public float $price;
    /**
     * @var string
     */
    public string $activate;
    /**
     * @var int
     */
    public int $id_category;
}