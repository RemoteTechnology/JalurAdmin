<?php

namespace App\Http\Services\Contracts;

use App\Models\Billing;
use Illuminate\Database\Eloquent\Collection;

interface BillingServiceInterface
{
    public function create(array $request): Billing;
    public function all(): Collection;
    public function show(int $user_id): Billing;
    public function showByRecord(int $record_id): Billing;
    public function status_back(Billing $billing): Billing;
}
