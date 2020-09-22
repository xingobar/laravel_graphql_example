<?php


namespace App\GraphQL\Query;


use App\User;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type as GraphqlType;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Log;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

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

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $user = new User;
        if (isset($args['id'])) {
            $user = $user->where('id', $args['id']);
        }

        if (isset($args['email'])) {
            $user = $user->where('email', $args['email']);
        }
        $fields = $info->getFieldSelection($depth = 3);
        Log::debug($fields);
        return $user->get();
    }
}