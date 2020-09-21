<?php


namespace App\GraphQL\Query;


use App\User;
use GraphQL\Type\Definition\Type as GraphqlType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class UserQuery extends Query
{

    protected $attributes = [
      'name' => 'users'
    ];

    public function type(): GraphqlType
    {
       return Type::listOf(GraphQL::type('users'));
    }

    public function resolve($root, $args)
    {
        return User::get();
    }
}