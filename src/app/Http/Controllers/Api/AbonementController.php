<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Abonement\AbonementCreateRequest;
use App\Http\Resources\Abonement\AbonementResource;
use App\Http\Services\AbonementService;
use Illuminate\Http\Request;

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
}
