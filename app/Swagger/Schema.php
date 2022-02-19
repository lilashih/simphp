<?php

/**
 * @OA\Parameter(
 *      parameter="SoftDeleteMode",
 *      in="query",
 *      name="mode",
 *      description="default: empty string<br>- empty string：It will not return soft deleted data<br>- trashed：It will return soft deleted data only<br>- all：It will return all data, include soft deleted",
 *      @OA\Schema(
 *          type="string",
 *          default="",
 *          enum={"", "trashed", "all"},
 *      )
 * )
 */