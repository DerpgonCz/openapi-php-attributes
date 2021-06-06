<?php

namespace App\OpenApiGenerator\Attributes;

use App\OpenApiGenerator\Types\RequestBodyType;
use JsonSerializable;

/**
 * The entire request body where you can specify the return type and a schema
 */
#[\Attribute]
class RequestBody implements JsonSerializable
{
    private ?Schema $schema = null;

    public function __construct(private ?string $type = null)
    {
        $type ??= RequestBodyType::JSON;
    }

    public function setSchema(Schema $schema): void
    {
        $this->schema = $schema;
    }

    public function jsonSerialize(): array
    {
        if (!$this->schema) {
            return [];
        }

        // TODO: deal with media content or any other types (cf. $this->type)
        return [
            "content" => [
                "application/json" => [
                    "schema" => $this->schema
                ]
            ]
        ];
    }
}