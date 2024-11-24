<?php

namespace App\Http\Controllers;

use App\Http\Services\HallService;
use Illuminate\Support\Facades\Cache;

class HallController extends Controller
{
    protected HallService $_hallService;
    public function __construct(HallService $hallService)
    {
        $this->_hallService = $hallService;
    }

    public function index()
    {
        return view("halls.index", [
            "title"     => "Залы",
            "halls"     => Cache::get('hall')
        ]);
    }

    public function show(int $id)
    {
        return view("halls.show", [
            "title"     => "Залы",
            "hall"      => $this->_hallService->show($id)
        ]);
    }
}
