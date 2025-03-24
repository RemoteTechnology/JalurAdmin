<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Services\AbonementService;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class AbonementSellController extends Controller
{
    private AbonementService $_abonementService;

    public function __construct(AbonementService $abonementService)
    {
        $this->_abonementService = $abonementService;
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'abonement_id' => ['required', 'integer', 'exists:abonements,id'],
            'price' => ['required', 'numeric']
        ], [
            'user_id.required' => 'Поле обязательно для заполнения',
            'user_id.integer' => 'Значение должно быть целым числом',
            'user_id.exists' => 'Пользователя с таким идентификатором не существует',
            'abonement_id.required' => 'Поле обязательно для заполнения',
            'abonement_id.integer' => 'Значение должно быть целым числом',
            'abonement_id.exists' => 'Абонемент с таким идентификатором не существует',
            'price.required' => 'Поле обязательно для заполнения',
            'price.numeric' => 'Значение должно быть числом'
        ]);

        

        if($validator->fails())
        {
            return response()->json($validator->errors())->setStatusCode(400);
        }

        $requestPayload = $validator->validated();

        $statusCode = $this->_abonementService->sell($requestPayload) ? 200 : 400;

        return response(status: $statusCode);
    }
}
