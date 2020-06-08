<?php


namespace App\Domain\Clients\Service;


use App\Domain\Clients\Repository\ClientCreator;
use App\Exception\ValidationException;
use App\Util\UploadFile;
use Slim\Psr7\UploadedFile;


class CreatorClient
{
    private ClientCreator $repository;

    public function __construct(ClientCreator $repository)
    {
        $this->repository = $repository;
    }

    public function createClient(array $data)
    {
        try {
            $this->validateNewClient($data);
            $this->repository->insertClient($data);
            return ['client' => 'client create'];
        } catch (\Throwable $t) {
            return ['error' => $t->getMessage(), 'code' => $t->getCode()];
        }
    }

    private function validateNewClient(array $data)
    {
        $errors = [];
        if (empty($data['username'])) {
            $errors['username'] = 'Input required';
        }
        if (empty($data['email'])) {
            $errors['email'] = 'Input required';
        } elseif (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors['email'] = 'Invalid email address';
        }

        if ($errors) {
            throw new ValidationException("Please check your inputs ", $errors, 500);
        }
    }


}
