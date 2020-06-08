<?php


namespace App\Domain\Dishes\Data;


class DishesData
{
    /**
     * @var int
     */
    private int $id;
    /**
     * @var string
     */
    private string $title;
    /**
     * @var string
     */
    private string $description;
    private $image;
    /**
     * @var float
     */
    private float $price;
    /**
     * @var string
     */
    private string $activate;
    /**
     * @var int
     */
    private int $id_category;
}