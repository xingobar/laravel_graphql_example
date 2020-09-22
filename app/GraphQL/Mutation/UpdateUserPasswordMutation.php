<?php

namespace App\GraphQL\Mutation;

use App\User;
use GraphQL\Type\Definition\Type;
use Illuminate\Support\Facades\Hash;
use Rebing\GraphQL\Support\Mutation;
use App\Exceptions\NotFoundHttpException;
use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type as GraphqlType;

class UpdateUserPasswordMutation extends Mutation
{
    public $attributes = [
        'name' => 'updateUserPassword',
    ];

    public function type(): GraphqlType
    {
        return GraphQL::type('users');
    }

    public function rules(array $args = []): array
    {
        return [
            'email'            => 'required',
            'password'         => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ];
    }

    public function validationErrorMessages(array $args = []): array
    {
        return [
            'email.required' => '請輸入電子郵件',
            'password.required' => '請輸入密碼',
            'password.min' => '請輸入:min密碼',
            'confirm_password.required' => '請輸入確認密碼',
            'confirm_password.same' => '密碼跟去認密碼需一致'
        ];
    }

    public function args(): array
    {
        return [
            'email' => [
                'name' => 'email',
                'type' => Type::nonNull(Type::string()),
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::nonNull(Type::string()),
            ],
            'confirm_password' => [
                'name' => 'confirm_password',
                'type' => Type::nonNull(Type::string()),
            ],
        ];
    }

    public function resolve($root, $args)
    {
        if (!$user = User::where('email', $args['email'])->first()) {
            throw new NotFoundHttpException();
        }

        if (!Hash::check($args['password'], $user->password)) {
            throw new NotFoundHttpException();
        }

        $user->update([
            'password' => Hash::make($args['password'])
        ]);
        return $user;
    }
}
