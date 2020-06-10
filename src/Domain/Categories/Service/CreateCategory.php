<?php


namespace App\Domain\Categories\Service;


use App\Domain\Categories\Repository\CategoryCreate;
use App\Exception\ValidationException;

class CreateCategory
{
    /**
     * @var CategoryCreate
     */
    private CategoryCreate $repository;

    /**
     * CreateCategory constructor.
     * @param CategoryCreate $repository
     */
    public function __construct(CategoryCreate $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return array|false|string|string[]
     */
    public function categoryCreator(array $data)
    {
        try {
            $this->validateNewCategory($data);
            $resp =  $this->repository->categoryCreate($data);
            return $resp;
        } catch (\Throwable $t) {
            return ['error' => $t->getMessage(), 'code' => $t->getCode()];
        }

    }

    /**
     * @param array $data
     */
    public function validateNewCategory(array $data)
    {
        $errors = [];
        if (empty($data['category'])):
            $errors['category'] = 'Input required';
        endif;
        if (empty($data['description'])):
            $errors['description'] = 'Input required';
        endif;
        if ($errors):
            throw new ValidationException("Please check your inputs ", $errors, 500);
        endif;
    }

}