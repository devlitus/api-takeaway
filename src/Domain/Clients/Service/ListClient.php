<?php


namespace App\Domain\Clients\Service;


use App\Domain\Clients\Repository\ClientList;

class ListClient
{
    /**
     * @var ClientList
     */
    private ClientList $repository;

    /**
     * ListClient constructor.
     * @param ClientList $repository
     */
    public function __construct(ClientList $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return array
     */
    public function list()
    {
        return $this->repository->listClient();
    }
}
