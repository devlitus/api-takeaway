<?php


namespace App\Domain\Clients\Service;


use App\Domain\Clients\Repository\ClientUpdate;
use App\Exception\ValidationException;

class UpdateClient
{
    private ClientUpdate $repository;
    public function __construct(ClientUpdate $repository)
    {
        $this->repository = $repository;
    }
    public function updateClient(array $data)
    {
        try {
            $this->validateClient($data);
            $r = $this->repository->clientUpdate($data);
            return $r;
        }catch (\Throwable $t){
            return ['error' => $t->getMessage(), 'code' => $t->getCode()];
        }

    }
    public function validateClient(array $data)
    {
        $errors = [];
        if (empty($data['id'])):
            $errors['id'] = 'Input required';
        endif;
        if ($errors):
            throw new ValidationException('cheked inputs', $errors, 500);
        endif;
    }
}