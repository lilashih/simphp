<?php

namespace App\Core\Request;

use App\Core\Request\Rule\UniqueRule;
use Rakit\Validation\Validator;
use Lilashih\Simphp\Repository\DatabaseRepository;
use Lilashih\Simphp\Request\BaseRequest as Request;

abstract class BaseRequest extends Request
{
    protected $repo;

    public function __construct($repo)
    {
        $this->repo = $repo;
    }

    protected function addValidator(Validator $validator): Validator
    {
        if (is_subclass_of($this->repo, DatabaseRepository::class)) {
            $validator->addValidator('unique', new UniqueRule($this->repo));
        }

        return $validator;
    }

    protected function message(): array
    {
        return [];
    }
}
