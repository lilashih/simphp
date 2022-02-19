<?php

namespace App\Http\Requests;

use App\Core\Request\BaseRequest;

class UserRequest extends BaseRequest
{
    protected function rule($data, $id): array
    {
        return [
            'name' => "required|max:200|unique:name,{$id}",
        ];
    }

    protected function format(array $data): array
    {
        return [
            'name' => $data['name'],
        ];
    }
}

/**
 * @OA\Schema(
 *   schema="UserRequest",
 *   description="Creating or Updating the user.",
 *   allOf={
 *     @OA\Schema(
 *       @OA\Property(property="name", type="string", description="name", example="Lucky"),
 *           required={"name"},
 *     ),
 *   }
 * )
 */
