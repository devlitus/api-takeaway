<?php


namespace App\Domain\Clients\Repository;


use App\Domain\Clients\Data\ClientData;
use App\Util\UploadFile;
use PDO;
use Slim\Psr7\UploadedFile;

class ClientCreator
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function insertClient(array $client)
    {
        $directory = '/var/www/server.net/htdocs/api-takeaway/src/upload/user';
        $user = new ClientData();
        $user->username = filter_var($client['username'], FILTER_SANITIZE_STRING);
        $user->email = filter_var($client['email'], FILTER_SANITIZE_EMAIL);
        $user->password = password_hash($client['password'], PASSWORD_DEFAULT, array('cost' => 10));
        (empty($client['activate'])) ? $user->activate = 'not': $user->activate = filter_var($client['activate'], FILTER_SANITIZE_STRING);
        (empty($client['role'])) ? $user->role = 'user' : $user->role = filter_var($client['role'], FILTER_SANITIZE_STRING);
        if (empty($client['image'])) {
            $user->image = 'default.jpg';
        }else {
            $image = new UploadFile($client['image'], $directory);
            $res = $image->moveUploadedFile();
            $user->image = $res;
        }
        $row = [
            'username' => $user->username,
            'email' => $user->email,
            'password' => $user->password,
            'image' => $user->image,
            'activate' => $user->activate,
            'role' => $user->role
        ];
        $statement = "INSERT INTO clients SET 
                            username=:username, 
                            email=:email, 
                            password=:password,
                            image=:image,
                            activate=:activate, 
                            role=:role;";
        $this->connection->prepare($statement)->execute($row);
//        return (int)$this->connection->lastInsertId();
    }
}
