<?php

namespace App\Console;

use App\Console\Commands\ExampleCommand;
use Lilashih\Simphp\Console\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    const COMMANDS = [
        'example' => ExampleCommand::class,
    ];
}
