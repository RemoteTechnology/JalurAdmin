<?php

namespace App\Http\Services;

use App\Http\Services\Contracts\BillingServiceInterface;
use App\Models\Billing;
use Illuminate\Database\Eloquent\Collection;

class BillingService implements BillingServiceInterface
{
    public function create(string $contract_id, array $request): Billing
    {
        $billing = new Billing();
        $billing->contract_id = $contract_id;
        $billing->user_id = $request['user_id'];
        $billing->status = 'Оплачен';
        $billing->payments = $request['payments'];
        $billing->save();
        return $billing;
    }
    public function all(): Collection
    {
        return Billing::all();
    }
    public function show(int $user_id): Billing
    {
        return Billing::where('user_id', '=', $user_id);
    }
    public function showByRecord(string $contract_id): Billing
    {
        return Billing::where('contract_id', '=', $contract_id);
    }
    public function status_back(Billing $billing): Billing
    {
        $billing->status = 'Возврат';
        $billing->save();
        return $billing;
    }
}
