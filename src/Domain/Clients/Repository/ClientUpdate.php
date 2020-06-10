<?php


namespace App\Domain\Clients\Repository;


use App\Domain\Clients\Data\ClientData;
use PDO;

class ClientUpdate
{
    private PDO $connection;
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }
    public function clientUpdate(array $data)
    {
        $camps = "";
        $id = $data['id'];
        foreach ($data as $key => $value):
            $camps .= $key . "='" . $value . "',";
        endforeach;
        $camps = substr($camps, 0, -1);
        $camps = substr($camps, 7);
            $statement = "UPDATE clients SET $camps WHERE id=$id;";
        return $statement;
    }
}