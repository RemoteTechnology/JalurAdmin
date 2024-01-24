<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BillingHistoryController extends Controller
{
    public function index()
    {
        return view('billing.index', [
            "title" => "История покупок"
        ]);
    }
}
