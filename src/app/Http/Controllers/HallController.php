<?php

namespace App\Http\Controllers;

use App\Http\Services\HallService;

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
            "halls"     => $this->_hallService->all()
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
