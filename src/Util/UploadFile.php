<?php


namespace App\Util;

use Slim\Psr7\UploadedFile;

class UploadFile
{
    private UploadedFile $uploadedFile;
    private string $directory;
    public function __construct(UploadedFile $uploadedFile, string $directory)
    {
        $this->uploadedFile = $uploadedFile;
        $this->directory = $directory;
    }
    public function moveUploadedFile()
    {
        $extension = pathinfo($this->uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
        $basename = bin2hex(random_bytes(5));
        $filename = sprintf('%s.%0.8s', $basename, $extension);

        $this->uploadedFile->moveTo($this->directory . DIRECTORY_SEPARATOR . $filename);
        return $filename;
    }

}