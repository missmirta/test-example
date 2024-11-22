<?php

declare(strict_types = 1);

namespace App\Services\Logger;

use App\Services\Logger\Contracts\LoggerInterface;

class DatabaseLogger implements LoggerInterface
{
    private string $type = 'database';

    public function send(string $message): void
    {
        // Simulate database logging
        echo "Inserting message into database: {$message}\n";
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
