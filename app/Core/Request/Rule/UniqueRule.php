<?php

namespace App\Core\Request\Rule;

use Rakit\Validation\Rule;
use Lilashih\Simphp\Repository\DatabaseRepository;

class UniqueRule extends Rule
{
    protected $message = ':attribute :value has been used';

    protected $fillableParams = ['column', 'exceptId'];

    protected $repo;

    public function __construct(DatabaseRepository $repo)
    {
        $this->repo = $repo;
    }

    public function check($value): bool
    {
        $this->requireParameters(['column']);

        $column = $this->parameter('column');
        $exceptId = $this->parameter('exceptId');

        return $this->repo->uniqueCheck($column, $value, $exceptId) === 0;
    }
}
