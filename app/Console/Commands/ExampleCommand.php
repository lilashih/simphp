<?php

namespace App\Console\Commands;

use Lilashih\Simphp\Console\Commands\BaseCommand;

class ExampleCommand extends BaseCommand
{
    public function handel()
    {
        static::print('hello command');
    }
}
