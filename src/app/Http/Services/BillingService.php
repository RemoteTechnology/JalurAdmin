<?php

namespace App\Http\Services;

use App\Http\Services\Contracts\BillingServiceInterface;
use App\Models\Billing;
use Illuminate\Database\Eloquent\Collection;

class BillingService implements BillingServiceInterface
{
    public function create(array $request): Billing
    {
        return Billing::create($request);
    }
    public function all(): Collection
    {
        return Billing::all();
    }
    public function show(int $user_id): Collection
    {
        return Billing::where('user_id', '=', $user_id);
    }
    public function status_back(Billing $billing): Billing
    {
        $billing->status = 'Возврат';
        $billing->save();
        return $billing;
    }
}
