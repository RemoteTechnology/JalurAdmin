<?php

namespace App\Http\Controllers\Api\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\UserEventService;
use Illuminate\Support\Facades\Validator;

class UserEventController extends Controller
{
    private UserEventService $_userEventService;

    public function __construct(UserEventService $userEventService)
    {
        $this->_userEventService = $userEventService;
    }

    public function writeOff(Request $request)
    {
        $requestPayload = $request->json()->all();

        $validator = Validator::make($requestPayload, [
            'user_id' => ['required', 'integer', 'exists:users,id']
        ], [
            'user_id.required' => 'Поле обязательно для заполнения',
            'user_id.integer' => 'Значение должно быть целым числом',
            'user_id.exists' => 'Пользователя с таким идентификатором не существует'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors())->setStatusCode(400);
        }

        $statusCode = $this->_userEventService->writeOff($validator->validated()) ? 200 : 400;

        return response(status: $statusCode);
    }

    public function return(Request $request)
    {
        $requestPayload = $request->json()->all();

        $validator = Validator::make($requestPayload, [
            'user_id' => ['required', 'integer', 'exists:users,id']
        ], [
            'user_id.required' => 'Поле обязательно для заполнения',
            'user_id.integer' => 'Значение должно быть целым числом',
            'user_id.exists' => 'Пользователя с таким идентификатором не существует'
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors())->setStatusCode(400);
        }

        $statusCode = $this->_userEventService->return($validator->validated()) ? 200 : 400;

        return response(status: $statusCode);
    }
}
