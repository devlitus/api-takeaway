<?php


namespace App\Domain\Categories\Service;


use App\Domain\Categories\Repository\CategoryList;

class ListCategory
{
    /**
     * @var CategoryList
     */
    private CategoryList $repository;

    /**
     * ListCategory constructor.
     * @param CategoryList $repository
     */
    public function __construct(CategoryList $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function listCategory()
    {
        return $this->repository->categoryList();
    }
}