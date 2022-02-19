<?php

namespace App\Repositories;

use App\Models\User as Model;
use Lilashih\Simphp\Repository\DatabaseRepository;

class UserRepository extends DatabaseRepository
{
    public function __construct()
    {
        $this->model = new Model();
    }
}
