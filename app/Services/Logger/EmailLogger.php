<?php

declare(strict_types = 1);

namespace App\Services\Logger;

use App\Services\Logger\Contracts\LoggerInterface;

class EmailLogger implements LoggerInterface
{
    private string $type = 'email';
    private string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function send(string $message): void
    {
        echo "Sending email to {$this->email} with message: {$message}\n";
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
