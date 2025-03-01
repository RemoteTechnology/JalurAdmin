<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\BillingService;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    protected BillingService $billingService;
    private static string $shopId = '1008978';
    public function __construct(BillingService $billingService)
    {
        $this->billingService = $billingService;
    }

    public function pay()
    {

    }
}
