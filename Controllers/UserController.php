<?php

namespace App\Controllers;

use App\App\App;
use App\Models\Users;

class UserController
{
    /**
     * @return null
     */
    public function getAuth()
    {
        $title = 'Авторизация';
        return view('works.auth', compact('title'));
    }

    /**
     * @return void
     */
    public function postAuth()
    {

    }
}