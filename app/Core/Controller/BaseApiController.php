<?php

namespace App\Core\Controller;

use App\Constants\ApiMessage;
use Lilashih\Simphp\Controller\BaseApiController as BaseController;

abstract class BaseApiController extends BaseController
{
    protected $messages = [
        'success_create' => ApiMessage::SUCCESS_CREATE,
        'success_update' => ApiMessage::SUCCESS_UPDATE,
        'success_delete' => ApiMessage::SUCCESS_DELETE,
    ];

    public function __construct()
    {
        // token check
        // $this->user = $this->getUser();
    }
}
