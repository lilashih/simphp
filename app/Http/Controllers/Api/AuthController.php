<?php

namespace App\Http\Controllers\Api;

use App\Constants\ApiMessage;
use App\Http\Requests\AuthRequest;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Lilashih\Simphp\Auth\JWT\JWT;
use Lilashih\Simphp\Controller\BaseController;
use Lilashih\Simphp\Log\Log;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->validator = new AuthRequest($this->repo);
    }

    /**
     * @return array
     * @throws Exception
     */
    public function login()
    {
        try {
            $data = $this->validator->validate('', $_POST);

            // Your login logic...
            $userId = -1;

            $token = (new JWT())->createToken($userId);

            return $this->resource($token);
        } catch (ModelNotFoundException $e) {
            throw new Exception(ApiMessage::ERROR_LOGIN);
        } catch (Exception $e) {
            Log::add('login failed', [
                'class' => $e,
                'err' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    protected function resource($token): array
    {
        return [
            'token' => $token,
        ];
    }
}

/**
 * @OA\Post(
 *   tags={"Auth"},
 *   path="/auth/login",
 *   description="Get the user's token",
 *   @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(property="name", type="string", description="name", example="Lucky"),
 *                 @OA\Property(property="password", type="string", description="password", example="123"),
 *                 required={"name", "password"},
 *             )
 *         )
 *   ),
 *   @OA\Response(
 *          response=200,
 *          description="Success",
 *          @OA\JsonContent(
 *                  @OA\Property(property="message", type="string", example=""),
 *                  @OA\Property(property="data", type="object",
 *                      @OA\Property(property="token", type="string", description="expires in 24 hours", example="fdsfew"),
 *                  ),
 *          )
 *   ),
 *   @OA\Response(
 *          response=422,
 *          description="Form data is incorrect",
 *          @OA\JsonContent(
 *                  @OA\Property(property="message", type="string", example=""),
 *                  @OA\Property(property="data", type="object",
 *                      @OA\Property(property="name", type="string", description="Please enter the username", example="Please enter the username"),
 *                      @OA\Property(property="password", type="string", description="Please enter password", example="Please enter password"),
 *                  ),
 *          )
 *   )
 * )
 */
