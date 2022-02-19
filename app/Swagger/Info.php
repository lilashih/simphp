<?php

/**
 * @OA\Info(
 *   title="API",
 *   version="1.0.0",
 * )
 *
 * @OA\Server(
 *   url="/api",
 * )
 *
 * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 *      name="Authorization",
 *      in="header"
 * )
 *
 */
