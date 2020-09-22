<?php

namespace App\GraphQL\Query;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;

class JobsQuery extends Query
{
    protected $attributes = [
        'name' => 'jobs',
    ];

    public function type(): GraphqlType
    {
        return Type::listOf(GraphQL::type('jobs'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
            ],
        ];
    }
}
