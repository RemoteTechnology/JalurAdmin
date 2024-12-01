<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hall\HallCreateRequest;
use App\Http\Requests\Hall\HallUpdateRequest;
use App\Http\Requests\Hall\HallDeleteRequest;
use App\Http\Services\HallService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HallFormController extends Controller
{
    protected HallService $_hallService;
    public function __construct(HallService $hallService)
    {
        $this->_hallService = $hallService;
    }

    public function create(HallCreateRequest $request)
    {
        $hall = $request->validated();
        if ($this->_hallService->create($hall))
        {
            Cache::forget('hall');
            Cache::forever('hall', $this->_hallService->all());
            return back()->with("success", "Данные успешно добавлены!");
        }
        return back()->with("error", $hall);
    }

    public function update(HallUpdateRequest $request)
    {
        $hall = $request->validated();
        if ($this->_hallService->update($hall))
        {
            Cache::forget('hall');
            Cache::forever('hall', $this->_hallService->all());
            return back()->with("success", "Данные успешно обновлены!");
        }
        return back()->with("error", $hall);
    }

    public function delete(HallDeleteRequest $request)
    {
        $hall = $request->validated();
        if ($this->_hallService->delete($hall["id"]))
        {
            Cache::forget('hall');
            Cache::forever('hall', $this->_hallService->all());
            return redirect()->route('hall.index')->with("success", "Данные успешно удалены!");
        }
        return back()->with("error", $hall);
    }
}
