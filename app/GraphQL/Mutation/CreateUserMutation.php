<?php


namespace App\GraphQL\Mutation;


use App\User;
use GraphQL\Type\Definition\Type as GraphqlType;
use GraphQL\Type\Definition\Type;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
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

    public function rules(array $args = []): array
    {
        return [
          'name' => [
              'required',
              'max:10'
          ],
          'email' => [
              'required',
              'email',
              'unique:users'
          ],
          'password' => [
              'required',
              'min:6'
          ]
        ];
    }

    public function validationErrorMessages(array $args = []): array
    {
        return [
            'name.required' => '請輸入名稱',
            'name.max' => '名字最長 :max 字',
            'email.email' => '電子郵件格式不符',
            'email.unique' => '電子郵件重複',
            'password.required' => '請輸入密碼',
            'password.min' => '密碼至少 :min 長度'
        ];
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