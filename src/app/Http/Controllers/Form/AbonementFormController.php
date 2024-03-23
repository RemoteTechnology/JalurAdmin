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
        if ($this->_abonementService->create($request->validated()))
        {
            return back()->with('success', 'Абонемент создан!');
        }
        return back()->with('error', 'Абонемент создать не удалось!');
    }
    public function update(AbonementUpdateRequest $request)
    {
        $context = $request->validated();
        if ($this->_abonementService->update(
            $this->_abonementService->show($context['id']),
            $context
        ))
        {
            return back()->with('success', 'Абонемент обновлён!');
        }
        return back()->with('error', 'Ошибка обновления данных!');
    }
    public function delete(int $id)
    {
        if ($this->_abonementService->delete($this->_abonementService->show($id)))
        {
            return back()->with('success', 'Данные удалены!');
        }
        return back()->with('error', 'Не удалось удалить абонемент!');
    }
}
