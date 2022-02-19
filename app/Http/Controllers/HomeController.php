<?php

namespace App\Http\Controllers;

class HomeController
{
    public const HOME = '/app/index.html';

    public function index()
    {
        // dd('this is home page');

        header('Location: ' . self::HOME, true, 301);
        exit();
    }
}