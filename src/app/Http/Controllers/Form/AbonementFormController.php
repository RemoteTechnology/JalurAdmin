<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Http\Requests\Abonement\AbonementCreateRequest;
use App\Http\Requests\Abonement\AbonementUpdateRequest;
use App\Http\Services\AbonementService;
use Illuminate\Http\Request;

class AbonementFormController extends Controller
{
    private AbonementService $_abonementService;
    public function __construct(AbonementService $abonementService)
    {
        $this->_abonementService = $abonementService;
    }
    public function create(AbonementCreateRequest $request)
    {
        return $this->_abonementService->create($request->validated());
    }
    public function update(AbonementUpdateRequest $request)
    {
        $context = $request->validated();
        return $this->_abonementService->update(
            $this->_abonementService->show($context['id']),
            $context
        );
    }
    public function delete(int $id)
    {
        return $this->_abonementService->delete(
            $this->_abonementService->show($id)
        );
    }
}
