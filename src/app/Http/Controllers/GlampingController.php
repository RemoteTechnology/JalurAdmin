<?php

namespace App\Http\Controllers;

use App\Http\Services\GlampingService;
use Illuminate\Http\Request;

class GlampingController extends Controller
{
    protected GlampingService $_glampingService;
    public function __construct(GlampingService $glampingService)
    {
        $this->_glampingService = $glampingService;
    }
    public function index()
    {
        return view("glamping.index", [
            "title"         => "Глемпинг",
            "glampings"     => $this->_glampingService->all()
        ]);
    }

    public function info(int $id)
    {
        return view("glamping.show", [
            "title"         => "Глемпинг",
            "glamping"      => $this->_glampingService->show($id)
        ]);
    }
}
