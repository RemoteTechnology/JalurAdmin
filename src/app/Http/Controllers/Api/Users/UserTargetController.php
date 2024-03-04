<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Target\UserTargetCreateRequest;
use App\Http\Requests\User\Target\UserTargetUpdateRequest;
use App\Http\Services\UserTargetService;
use Illuminate\Http\Request;

class UserTargetController extends Controller
{
    private UserTargetService $_userTargetService;
    public function __construct(UserTargetService $userTargetService)
    {
        $this->_userTargetService = $userTargetService;
    }
    public function create(UserTargetCreateRequest $request)
    {
        return $this->_userTargetService->create($request->validated());
    }
    public function show(int $user_id)
    {
        return $this->_userTargetService->show($user_id);
    }
    public function update(UserTargetUpdateRequest $request)
    {
        $request = $request->validated();
        return $this->_userTargetService->update(
            $this->_userTargetService->show($request['user_id']),
            $request
        );
    }
}
