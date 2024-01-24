<?php

namespace App\Http\Controllers;

use App\Http\Services\HallService;
use App\Http\Services\UserService;
use App\Http\Services\UserTargetService;

class UserController extends Controller
{
    protected UserService $_userService;
    protected HallService $_hallService;
    protected UserTargetService $_userTargetService;
    public function __construct(
        UserService $userService,
        HallService $hallService,
        UserTargetService $userTargetService
    )
    {
        $this->_userService = $userService;
        $this->_hallService = $hallService;
        $this->_userTargetService = $userTargetService;
    }
    public function index()
    {
        if (session()->get('users'))
        {
            return view("users.index", [
                "title"         => "Пользователи",
                "users"         => session()->get('users'),
                "halls"         => $this->_hallService->all(),
                "targets"       => $this->_userTargetService->all()
            ]);
        }
        if (session()->get('schedules'))
        {
            return view("users.index", [
                "title"         => "Пользователи",
                "users"         => session()->get('schedules'),
                "halls"         => $this->_hallService->all(),
                "targets"       => $this->_userTargetService->all()
            ]);
        }
        return view("users.index", [
            "title"         => "Пользователи",
            "users"         => $this->_userService->findByRole(),
            "halls"         => $this->_hallService->all(),
            "targets"       => $this->_userTargetService->all()
        ]);
    }

    public function registration()
    {
        return view("users.registration", [
            "title"         => "Пользователи",
        ]);
    }
    public function info(int $id)
    {
        return view("users.info", [
            "title"         => "Пользователи",
            "user"          => $this->_userService->findById($id),
            "target"        => $this->_userTargetService->show($id)
        ]);
    }
    public function login()
    {
        return view("users.login");
    }
    public function reset()
    {
        return view("users.reset");
    }
}
