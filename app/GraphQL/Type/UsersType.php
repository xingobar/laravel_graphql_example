<?php


namespace App\GraphQL\Type;


use App\User;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type;
use GraphQL\Type\Definition\Type as TypeDefinition;

class UsersType extends Type
{
    protected $attributes = [
        'name' => 'users',
        'description' => '用戶',
        'model' => User::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => TypeDefinition::nonNull(TypeDefinition::int()),
                 'description' => '用戶編號'
            ],
            'name' => [
              'type' => TypeDefinition::string(),
              'description'  => '用戶名稱'
            ],
            'email' => [
                'type' => TypeDefinition::string(),
                'description' => '電子郵件'
            ],
            'jobs' => [
                'name' => 'jobs',
                'type' => TypeDefinition::listOf(GraphQL::type('jobs')),
            ],
            'job' => [
                'name' => 'job',
                'type' => GraphQL::type('jobs'),
            ]
        ];
    }
}