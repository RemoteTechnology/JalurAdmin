<?php

namespace Database\Seeders;

use App\Models\Billing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $billings = [
            [
                'contract_id' => '532174ac-3ec4-45ad-aab4-e0d8aef93054',
                'user_id' => 6,
                'status' => 'Оплачен',
                'payments' => '{
                    "id": "22e12f66-000f-5000-8000-18db351245c7",
                    "status": "waiting_for_capture",
                    "paid": true,
                    "amount": {
                        "value": "6000.00",
                        "currency": "RUB"
                    },
                    "authorization_details": {
                        "rrn": "10000000000",
                        "auth_code": "000000",
                        "three_d_secure": {
                            "applied": true
                        }
                    },
                    "created_at": "2018-07-18T10:51:18.139Z",
                    "description": "Заказ №1",
                    "expires_at": "2018-07-25T10:52:00.233Z",
                    "metadata": {},
                    "payment_method": {
                        "type": "bank_card",
                        "id": "22e12f66-000f-5000-8000-18db351245c7",
                        "saved": false,
                        "card": {
                            "first6": "555555",
                            "last4": "4444",
                            "expiry_month": "07",
                            "expiry_year": "2022",
                            "card_type": "MasterCard",
                            "issuer_country": "RU",
                            "issuer_name": "Sberbank"
                        },
                        "title": "Bank card *4444"
                    },
                    "recipient": {
                        "account_id": "100500",
                        "gateway_id": "100700"
                    },
                    "refundable": false,
                    "test": false,
                    "income_amount": {
                        "value": "1.97",
                        "currency": "RUB"
                    }
                }'
            ],
            [
                'contract_id' => '94b99d78-de37-476b-b3de-6b8e7d7bd5b7',
                'user_id' => 7,
                'status' => 'Оплачен',
                'payments' => '{
                    "id": "22e12f66-000f-5000-8000-18db351245c7",
                    "status": "waiting_for_capture",
                    "paid": true,
                    "amount": {
                        "value": "6000.00",
                        "currency": "RUB"
                    },
                    "authorization_details": {
                        "rrn": "10000000000",
                        "auth_code": "000000",
                        "three_d_secure": {
                            "applied": true
                        }
                    },
                    "created_at": "2018-07-18T10:51:18.139Z",
                    "description": "Заказ №1",
                    "expires_at": "2018-07-25T10:52:00.233Z",
                    "metadata": {},
                    "payment_method": {
                        "type": "bank_card",
                        "id": "22e12f66-000f-5000-8000-18db351245c7",
                        "saved": false,
                        "card": {
                            "first6": "555555",
                            "last4": "4444",
                            "expiry_month": "07",
                            "expiry_year": "2022",
                            "card_type": "MasterCard",
                            "issuer_country": "RU",
                            "issuer_name": "Sberbank"
                        },
                        "title": "Bank card *4444"
                    },
                    "recipient": {
                        "account_id": "100500",
                        "gateway_id": "100700"
                    },
                    "refundable": false,
                    "test": false,
                    "income_amount": {
                        "value": "1.97",
                        "currency": "RUB"
                    }
                }'
            ],
            [
                'contract_id' => '2c10ff5d-b004-476f-9ea0-ddcff57df792',
                'user_id' => 8,
                'status' => 'Возврат',
                'payments' => '{
                    "id": "22e12f66-000f-5000-8000-18db351245c7",
                    "status": "waiting_for_capture",
                    "paid": true,
                    "amount": {
                        "value": "1200.00",
                        "currency": "RUB"
                    },
                    "authorization_details": {
                        "rrn": "10000000000",
                        "auth_code": "000000",
                        "three_d_secure": {
                            "applied": true
                        }
                    },
                    "created_at": "2018-07-18T10:51:18.139Z",
                    "description": "Заказ №1",
                    "expires_at": "2018-07-25T10:52:00.233Z",
                    "metadata": {},
                    "payment_method": {
                        "type": "bank_card",
                        "id": "22e12f66-000f-5000-8000-18db351245c7",
                        "saved": false,
                        "card": {
                            "first6": "555555",
                            "last4": "4444",
                            "expiry_month": "07",
                            "expiry_year": "2022",
                            "card_type": "MasterCard",
                            "issuer_country": "RU",
                            "issuer_name": "Sberbank"
                        },
                        "title": "Bank card *4444"
                    },
                    "recipient": {
                        "account_id": "100500",
                        "gateway_id": "100700"
                    },
                    "refundable": false,
                    "test": false,
                    "income_amount": {
                        "value": "1.97",
                        "currency": "RUB"
                    }
                }'
            ],
            [
                'contract_id' => 'f1c4d552-8fd2-4dcb-95df-9db7aabc32fa',
                'user_id' => 10,
                'status' => 'Оплачен',
                'payments' => '{
                    "id": "22e12f66-000f-5000-8000-18db351245c7",
                    "status": "waiting_for_capture",
                    "paid": true,
                    "amount": {
                        "value": "600.00",
                        "currency": "RUB"
                    },
                    "authorization_details": {
                        "rrn": "10000000000",
                        "auth_code": "000000",
                        "three_d_secure": {
                            "applied": true
                        }
                    },
                    "created_at": "2018-07-18T10:51:18.139Z",
                    "description": "Заказ №1",
                    "expires_at": "2018-07-25T10:52:00.233Z",
                    "metadata": {},
                    "payment_method": {
                        "type": "bank_card",
                        "id": "22e12f66-000f-5000-8000-18db351245c7",
                        "saved": false,
                        "card": {
                            "first6": "555555",
                            "last4": "4444",
                            "expiry_month": "07",
                            "expiry_year": "2022",
                            "card_type": "MasterCard",
                            "issuer_country": "RU",
                            "issuer_name": "Sberbank"
                        },
                        "title": "Bank card *4444"
                    },
                    "recipient": {
                        "account_id": "100500",
                        "gateway_id": "100700"
                    },
                    "refundable": false,
                    "test": false,
                    "income_amount": {
                        "value": "1.97",
                        "currency": "RUB"
                    }
                }'
            ],
        ];
        foreach ($billings as $billing)
        {
            Billing::create($billing);
        }
    }
}
