<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Lilashih\Simphp\Model\BaseModel;

class User extends BaseModel
{
    use SoftDeletes;

    protected $table = 'users';
    protected $sortColumn = null;
}