<?php


namespace App\Domain\Clients\Data;


use App\Util\UploadFile;


class ClientData
{
    /**
     * @var int
     */
    public int $id;
    /**
     * @var string
     */
    public string $username;
    /**
     * @var string
     */
    public string $email;
    /**
     * @var string
     */
    public $password;
    /**
     * @var UploadFile
     */
    public $image;

    /**
     * @var string
     */
    public string $activate;
    /**
     * @var string
     */
    public string $role;
}
