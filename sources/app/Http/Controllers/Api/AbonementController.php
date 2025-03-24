<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Abonement\AbonementResource;
use App\Http\Services\AbonementService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AbonementController extends Controller
{
    private AbonementService $_abonementService;
    public function __construct(AbonementService $abonementService)
    {
        $this->_abonementService = $abonementService;
    }

    public function show(int $id)
    {
        return response()->json(
            new AbonementResource($this->_abonementService->show($id))
        )->setStatusCode(200);
    }
    public function all()
    {
        return response()->json(
            AbonementResource::collection($this->_abonementService->all())
        )->setStatusCode(200);
    }
    public function create(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'title'                 => ['required'],
            'price'                 => ['required', 'numeric'],
            'time_of_action'        => ['required', 'integer'],
            'avaible_workout_count' => ['required', 'integer']
        ], [
            'title.required' => 'Поле обязательно для заполнения',
            'price.required' => 'Поле обязательно для заполнения',
            'price.numeric' => 'Значение должно быть числом',
            'time_of_action.required' => 'Поле обязательно для заполнения',
            'time_of_action.integer' => 'Значение должно быть целым числом',
            'avaible_workout_count.required' => 'Поле обязательно для заполнения',
            'avaible_workout_count.integer' => 'Значение должно быть целым числом'
        ]);

        if ($validator->fails())
        {
            return response()->json($validator->errors())->setStatusCode(400);
        }

        $abonement = $validator->validated();

        return response()->json(
            new AbonementResource($this->_abonementService->create($abonement))
        )->setStatusCode(201);
    }
    
    public function update()
    {
        
    }
}
 