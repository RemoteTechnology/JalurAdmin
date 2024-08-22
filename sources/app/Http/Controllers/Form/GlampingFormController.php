<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Http\Requests\Glamping\GlampingCreateRequest;
use App\Http\Requests\Glamping\GlampingDeleteRequest;
use App\Http\Requests\Glamping\GlampingUpdateRequest;
use App\Http\Services\GlampingService;
use Illuminate\Http\Request;

class GlampingFormController extends Controller
{
    protected GlampingService $_glampingService;
    public function __construct(GlampingService $glampingService)
    {
        $this->_glampingService = $glampingService;
    }
    public function create(Request $request_files, GlampingCreateRequest $request)
    {
        $glamping = $request->validated();
        if ($this->_glampingService->create($glamping, $request_files->file('image')))
        {
            return back()->with("success","Данные успешно добавлены!");
        }
        else
        {
            return back()->with("error", $glamping);
        }
    }
    public function update(Request $request_files, GlampingUpdateRequest $request)
    {
        $glamping = $request->validated();
        if ($this->_glampingService->update($glamping, $request_files->file('image')))
        {
            return back()->with("success","Данные успешно обновлены!");
        }
        else
        {
            return back()->with("error", $glamping);
        }
    }
    public function delete(GlampingDeleteRequest $request)
    {
        $glamping = $request->validated();
        if ($this->_glampingService->delete($glamping["id"]))
        {
            return back()->with("success","Данные успешно добавлены!");
        }
        else
        {
            return back()->with("error", $glamping);
        }
    }
}
