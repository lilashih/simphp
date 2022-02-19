<?php

namespace App\Http\Resources;

use Lilashih\Simphp\Resource\BaseResource;

class UserResource extends BaseResource
{
    public static $key = [
        'collection' => 'users',
        'resource' => 'user',
    ];

    public static function toArray(array $data): array
    {
        return [
            'id' => $data['id'],
            'name' => $data['name'],
            'updated_at' => $data['updated_at'],
            'deleted_at' => $data['deleted_at'],
        ];
    }
}

/**
 * @OA\Schema(
 *   schema="User",
 *   allOf={
 *     @OA\Property(ref="#/components/schemas/UserRequest"),
 *   }
 * )
 */
