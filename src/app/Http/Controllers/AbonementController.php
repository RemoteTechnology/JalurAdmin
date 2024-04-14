<?php

namespace App\Http\Controllers;

use App\Http\Services\AbonementService;
use Illuminate\Http\Request;

class AbonementController extends Controller
{
    private AbonementService $_abonementService;
    public function __construct(AbonementService $abonementService)
    {
        $this->_abonementService = $abonementService;
    }
    public function index()
    {
        return view('abonement.index', [
            'title' => 'Абонементы',
            'abonements' => $this->_abonementService->all()
        ]);
    }
    public function show(int $id)
    {
        return view('abonement.show', [
            'title' => 'Абонементы',
            'abonement' => $this->_abonementService->show($id)
        ]);
    }
}
