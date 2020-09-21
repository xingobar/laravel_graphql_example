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

    // graphql argument
    public function args(): array
    {
        return [
              'id' => [
                  'name' => 'id',
                  'type' => Type::int()
              ],
              'email' => [
                    'name' => 'email',
                    'type' => Type::string()
              ],
              'limit' => [
                  'name' => 'limit',
                  'type' => Type::int(),
              ]
        ];
    }

    public function resolve($root, $args)
    {
        $user = new User;
        if (isset($args['id'])) {
            $user = $user->where('id', $args['id']);
        }

        if (isset($args['email'])) {
            $user = $user->where('email', $args['email']);
        }

        return $user->get();
    }
}