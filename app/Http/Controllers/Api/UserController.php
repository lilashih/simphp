<?php

namespace App\Http\Controllers\Api;

use App\Core\Controller\BaseApiController;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;

class UserController extends BaseApiController
{
    public function __construct()
    {
        parent::__construct();
        $this->repo = new UserRepository();
        $this->validator = new UserRequest($this->repo);
        $this->resource = UserResource::class;
    }
}

/**
 * @OA\Get(
 *   tags={"User"},
 *   path="/users",
 *   security={{"bearerAuth": {}}},
 *
 *   @OA\Parameter(in="query", name="name"),
 *   @OA\Parameter(ref="#/components/parameters/SoftDeleteMode"),
 *
 *   @OA\Response(
 *          response=200,
 *          description="Success",
 *          @OA\JsonContent(
 *                  @OA\Property(property="message", type="string", example=""),
 *                  @OA\Property(property="data", type="object",
 *                      @OA\Property(property="users", type="array",
 *                          @OA\Items(ref="#/components/schemas/User"),
 *                      ),
 *                  )
 *          )
 *   )
 * )
 */

/**
 * @OA\Get(
 *   tags={"User"},
 *   path="/users/{id}",
 *   security={{"bearerAuth": {}}},
 *
 *   @OA\Parameter(in="path", name="id", description="id", required=true,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *   ),
 *
 *   @OA\Response(
 *          response=200,
 *          description="Success",
 *          @OA\JsonContent(
 *                  @OA\Property(property="message", type="string", example=""),
 *                  @OA\Property(property="data", type="object",
 *                      @OA\Property(property="users", ref="#/components/schemas/User"),
 *                  )
 *          )
 *   ),
 *   @OA\Response(
 *          response=400,
 *          description="It has been deleted or the id has no information",
 *          @OA\JsonContent(
 *                  @OA\Property(property="message", type="string", example="Model not found"),
 *                  @OA\Property(property="data", type="object")
 *          )
 *   )
 * )
 */

/**
 * @OA\Post(
 *   tags={"User"},
 *   path="/users",
 *   description="Will check for duplicate names, but will not check for soft deleted data",
 *   security={{"bearerAuth": {}}},
 *   @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(ref="#/components/schemas/UserRequest")
 *         )
 *   ),
 *   @OA\Response(
 *          response=200,
 *          description="Success",
 *          @OA\JsonContent(
 *                  @OA\Property(property="message", type="string", example="Success"),
 *                  @OA\Property(property="data", type="object"),
 *          )
 *   ),
 *   @OA\Response(
 *          response=422,
 *          description="Form data is incorrect",
 *         @OA\JsonContent(
 *              oneOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="message", type="string", example=""),
 *                      @OA\Property(property="data", type="object",
 *                         @OA\Property(property="name", type="string", description="required", example="The Name is required"),
 *                     ),
 *                  ),
 *                  @OA\Schema(
 *                      @OA\Property(property="message", type="string", example=""),
 *                      @OA\Property(property="data", type="object",
 *                         @OA\Property(property="name", type="string", description="duplicate", example="Name Tom has been used"),
 *                     ),
 *                  ),
 *              },
 *         ),
 *   ),
 * )
 */

/**
 * @OA\Put(
 *   tags={"User"},
 *   path="/users/{id}",
 *   description="Will check for duplicate names, but will not check for soft deleted data",
 *   security={{"bearerAuth": {}}},
 *
 *   @OA\Parameter(in="path", name="id", description="id", required=true,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *   ),
 *   @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(ref="#/components/schemas/UserRequest")
 *         )
 *   ),
 *   @OA\Response(
 *          response=200,
 *          description="Success",
 *          @OA\JsonContent(
 *                  @OA\Property(property="message", type="string", example="Success"),
 *                  @OA\Property(property="data", type="object"),
 *          )
 *   ),
 *   @OA\Response(
 *         response=422,
 *         description="Form data is incorrect",
 *         @OA\JsonContent(
 *              oneOf={
 *                  @OA\Schema(
 *                     @OA\Property(property="message", type="string", example=""),
 *                     @OA\Property(property="data", type="object",
 *                        @OA\Property(property="name", type="string", description="required", example="The Name is required"),
 *                     ),
 *                  ),
 *                  @OA\Schema(
 *                     @OA\Property(property="message", type="string", example=""),
 *                     @OA\Property(property="data", type="object",
 *                        @OA\Property(property="name", type="string", description="duplicate", example="Name Tom has been used"),
 *                     ),
 *                  ),
 *              },
 *         ),
 *   ),
 *   @OA\Response(
 *          response=400,
 *          description="It has been deleted or the id has no information",
 *          @OA\JsonContent(
 *                  @OA\Property(property="message", type="string", example="Model not found"),
 *                  @OA\Property(property="data", type="object")
 *          )
 *   )
 * )
 */

/**
 * @OA\Delete(
 *   tags={"User"},
 *   path="/users/{id}",
 *   security={{"bearerAuth": {}}},
 *
 *   @OA\Parameter(in="path", name="id", description="id", required=true,
 *          @OA\Schema(
 *              type="integer"
 *          )
 *   ),
 *   @OA\Response(
 *          response=200,
 *          description="Success",
 *          @OA\JsonContent(
 *                  @OA\Property(property="message", type="string", example="Success"),
 *                  @OA\Property(property="data", type="object")
 *          )
 *   ),
 *   @OA\Response(
 *          response=400,
 *          description="It has been deleted or the id has no information",
 *          @OA\JsonContent(
 *                  @OA\Property(property="message", type="string", example="Model not found"),
 *                  @OA\Property(property="data", type="object")
 *          )
 *   )
 * )
 */