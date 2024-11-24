<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hall\HallResource;
use App\Http\Services\HallService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HallController extends Controller
{
    private HallService $_hallService;
    public function __construct(HallService $hallService)
    {
        $this->_hallService = $hallService;
    }
    public function index()
    {
        return HallResource::collection(Cache::get('hall'));
    }
    public function show(int $id)
    {
        return new HallResource($this->_hallService->show($id));
    }
}
