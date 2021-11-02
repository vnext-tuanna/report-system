<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class TestController
{

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();

        return view('user.index', compact('users'));
    }
}
