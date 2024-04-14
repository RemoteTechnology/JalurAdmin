<?php

namespace App\Http\Services\Contracts;

use App\Models\Billing;
use App\Models\Record;

interface PaymentServiceInterface
{
    public function send(Record $record);
    public function back(Billing $billing);
}
