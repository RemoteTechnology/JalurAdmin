<?php

namespace App\Http\Controllers;

use App\Http\Services\HallService;
use App\Http\Services\RecordService;
use App\Http\Services\UserService;
use App\Http\Services\UserTargetService;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    protected UserService $_userService;
    protected HallService $_hallService;
    protected UserTargetService $_userTargetService;
    protected RecordService $_recordService;
    public function __construct(
        UserService $userService,
        HallService $hallService,
        UserTargetService $userTargetService,
        RecordService $recordService,
    )
    {
        $this->_userService = $userService;
        $this->_hallService = $hallService;
        $this->_userTargetService = $userTargetService;
        $this->_recordService = $recordService;
    }
    public function index()
    {
        if (session()->get('users'))
        {
            return view("users.index", [
                "title"         => "Пользователи",
                "users"         => session()->get('users'),
                "halls"         => Cache::get('hall'),
                "targets"       => $this->_userTargetService->all(),
                "records"       => $this->_recordService->all()
            ]);
        }
        if (session()->get('schedules'))
        {
            return view("users.index", [
                "title"         => "Пользователи",
                "users"         => session()->get('schedules'),
                "halls"         => Cache::get('hall'),
                "targets"       => $this->_userTargetService->all(),
                "records"       => []
            ]);
        }
        return view("users.index", [
            "title"         => "Пользователи",
            "users"         => $this->_userService->findByRole(),
            "halls"         => Cache::get('hall'),
            "targets"       => $this->_userTargetService->all(),
            "records"       => []
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
