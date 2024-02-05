<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Http\Services\RecordService;
use Illuminate\Http\Request;

class RecordFormController extends Controller
{
    private RecordService $_recordService;
    public function __construct(RecordService $recordService)
    {
        $this->_recordService = $recordService;
    }
    public function create(Request $requests)
    {
        foreach ($requests->users as $request) {
            $this->_recordService->create([
                "schedule_id" => $requests->schedule_id,
                "user_id" => $request
            ]);
        }
        return back();
    }
}
