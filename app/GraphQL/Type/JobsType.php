<?php

namespace App\GraphQL\Type;

use App\Models\Jobs;
use Rebing\GraphQL\Support\Type;
use GraphQL\Type\Definition\Type as TypeDefinition;

class JobsType extends Type
{
    protected $attributes = [
        'name'        => 'jobs',
        'description' => '工作',
        'model'       => Jobs::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type'        => TypeDefinition::nonNull(TypeDefinition::int()),
                'description' => '工作編號',
            ],
            'name' => [
                'type' => TypeDefinition::string(),
                'description' => '工作名稱'
            ],
            'description' => [
                'type' => TypeDefinition::string(),
                'description'=> '工作描述'
            ]
        ];
    }
}
