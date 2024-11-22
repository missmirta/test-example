<?php

declare(strict_types = 1);

namespace App\Services\Logger\Contracts;

interface LoggerInterface
{
    public function send(string $message): void;
    public function sendByLogger(string $message, string $loggerType): void;
    public function getType(): string;
    public function setType(string $type): void;
}
