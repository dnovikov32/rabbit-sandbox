<?php

declare(strict_types=1);

namespace App\Bus;

class EventMessage
{
    private int $id;
    private array $context;

    public function __construct(int $id, array $context = [])
    {
        $this->id = $id;
        $this->context = $context;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getContext(): array
    {
        return $this->context;
    }

    public function getBody(): ?array
    {
        return null;
    }

    public function getHeaders(): ?array
    {
        return null;
    }
}