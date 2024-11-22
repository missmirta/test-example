<?php

declare(strict_types = 1);

namespace App\Services\Logger;

use App\Services\Logger\Contracts\LoggerInterface;

class FileLogger implements LoggerInterface
{
    private string $type = 'file';
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function send(string $message): void
    {
        file_put_contents(storage_path($this->filePath), $message . PHP_EOL, FILE_APPEND);
        echo "Writing message to file: {$message}\n";
    }

    public function sendByLogger(string $message, string $loggerType): void
    {
        $this->send($message);
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
