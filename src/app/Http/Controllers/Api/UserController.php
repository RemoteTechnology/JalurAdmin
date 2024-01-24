<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserAuthentificationMobileRequest;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCodeResource;
use App\Http\Resources\User\UserAuthMobileResource;
use App\Http\Resources\User\UserLogoutMobileResource;
use App\Http\Services\UserService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $_userService;
    public function __construct(UserService $userService)
    {
        $this->_userService = $userService;
    }

    public function create(UserCreateRequest $request): ?UserResource
    {
        $user = $request->validated();
        return new UserResource($this->_userService->create($user, null, 'mobile'));
    }
    public function send_code(string $phone): UserCodeResource
    {
        return new UserCodeResource(
            new Collection($this->_userService->send_code($phone))
        );
    }
    public function auth(UserAuthentificationMobileRequest $request): ?UserAuthMobileResource
    {
        $user = $request->validated();
        return new UserAuthMobileResource($this->_userService->auth(
            $this->_userService->findByPhone($user["phone"]),
            $user["code"],
            "mobile"
        ));
    }
    public function logout(int $id): ?UserLogoutMobileResource
    {
        return new UserLogoutMobileResource($this->_userService->logout(
            $this->_userService->findById($id),
            'mobile'
        ));
    }
    public function show(int $id)
    {
        return new UserResource($this->_userService->show($id));
    }
    public function findByRole(string $role)
    {
        // return new UserResource($this->_userService->findByRole($role));
        return UserResource::collection($this->_userService->findByRole($role));
    }
    public function update(Request $request)
    {
        return new UserResource($this->_userService->update(
            $this->_userService->findById($request->id),
            $request
        ));
    }
}
