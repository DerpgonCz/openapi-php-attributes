<?php

namespace App\OpenApiGenerator\Attributes;


use JsonSerializable;

#[\Attribute(\Attribute::TARGET_CLASS)]
class Info implements JsonSerializable
{
    public function __construct(private string $title, private string $version)
    {
    }

    public function jsonSerialize(): array
    {
        return [
            "title" => $this->title,
            "version" => $this->version,
        ];
    }
}