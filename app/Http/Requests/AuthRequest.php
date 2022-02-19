<?php

namespace App\Http\Requests;

use App\Core\Request\BaseRequest;

class AuthRequest extends BaseRequest
{
    protected function rule($data, $id): array
    {
        return [
            'name' => 'required',
            'password' => 'required',
        ];
    }

    protected function format(array $data): array
    {
        return array_only($data, ['name', 'password']);
    }

    protected function message(): array
    {
        return [];
    }
}

/**
 * @OA\Schema(
 *   schema="Auth",
 *   allOf={
 *     @OA\Schema(
 *       @OA\Property(property="name", type="string", description="name", example="Tom"),
 *       @OA\Property(property="password", type="string", description="password", example="123"),
 *     ),
 *   }
 * )
 */
