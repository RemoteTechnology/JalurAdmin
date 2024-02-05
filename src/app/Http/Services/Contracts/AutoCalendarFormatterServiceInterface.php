<?php

namespace App\Http\Services\Contracts;

interface AutoCalendarFormatterServiceInterface
{
    public function calendar(int $hall_id, int $day, int$month, int $year): array;
}
