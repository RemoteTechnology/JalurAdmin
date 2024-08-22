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
        $billing->payments = '[{"id": "22e12f66-000f-5000-8000-18db351245c7", "paid": true, "test": false, "amount": {"value": "1000.00", "currency": "RUB"}, "status": "waiting_for_capture", "metadata": {}, "recipient": {"account_id": "100500", "gateway_id": "100700"}, "created_at": "2018-07-18T10:51:18.139Z", "expires_at": "2018-07-25T10:52:00.233Z", "refundable": false, "description": "Заказ №1", "income_amount": {"value": "1.97", "currency": "RUB"}, "payment_method": {"id": "22e12f66-000f-5000-8000-18db351245c7", "card": {"last4": "4444", "first6": "555555", "card_type": "MasterCard", "expiry_year": "2022", "issuer_name": "Sberbank", "expiry_month": "07", "issuer_country": "RU"}, "type": "bank_card", "saved": false, "title": "Bank card *4444"}, "authorization_details": {"rrn": "10000000000", "auth_code": "000000", "three_d_secure": {"applied": true}}}]';
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
        return Billing::where('contract_id', $contract_id)->first();
    }
    public function status_back(Billing $billing): Billing
    {
        $billing->status = 'Возврат';
        $billing->save();
        return $billing;
    }
}
