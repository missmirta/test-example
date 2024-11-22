<?php

declare(strict_types=1);

namespace App\DTO;

class ConfigParams
{
    private function __construct(
        private readonly string $defaultLogger,
        private readonly string $email,
        private readonly string $filePath,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['default_logger'],
            $data['email'],
            $data['file_path'],
        );
    }

    public function getDefaultLogger(): string
    {
        return $this->defaultLogger;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }
}
