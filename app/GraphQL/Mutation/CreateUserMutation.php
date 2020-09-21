<?php


namespace App\GraphQL\Mutation;


use App\User;
use GraphQL\Type\Definition\Type as GraphqlType;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Hash;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class CreateUserMutation extends Mutation
{
    public $attributes = [
      'name' => 'createUser'
    ];

    public function type(): GraphqlType
    {
       return GraphQL::type('users');
    }

    public function args(): array
    {
        return [
          'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string()),
          ],
            'email' => [
              'name' => 'email',
               'type' => Type::nonNull(Type::string()),
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::nonNull(Type::string()),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $user = new User();
        $user->fill($args)->save();
        return $user;
    }
}