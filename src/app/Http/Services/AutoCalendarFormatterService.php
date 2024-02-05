<?php

namespace App\Http\Services;

use App\Http\Services\Contracts\AutoCalendarFormatterServiceInterface;
use Carbon\Carbon;
use TypeError;

class AutoCalendarFormatterService implements AutoCalendarFormatterServiceInterface
{
    protected Carbon $carbon;
    private int $number_of_days;
    private array $calendar;
    private ScheduleService $_scheduleService;
    public function __construct(ScheduleService $scheduleService)
    {
        $this->carbon                       = Carbon::now();
        $this->number_of_days               = $this->carbon->daysInMonth;
        $this->calendar                     = [array(),  array(), array(), array(), array(), array()];
        $this->_scheduleService             = $scheduleService;
    }
    private function format(bool $date, int $s, int $count): void
    {
        if ($date && $s == 0)
        {
            $index = 1;
            while ($index <= $count)
            {
                array_push($this->calendar[0], []);
                $index++;
            }

        }
    }
    private function add_void(int $week, int $less=7): void
    {
        while (count($this->calendar[$week]) < $less)
        {
            array_push($this->calendar[$week], []);
        }
    }
    private function add_month(int $month, int $year): array
    {
        $month_name = 'Неопознано';
        if ($month == 1) $month_name         = 'Январь';
        if ($month == 2) $month_name         = 'Февраль';
        if ($month == 3) $month_name         = 'Март';
        if ($month == 4) $month_name         = 'Апрель';
        if ($month == 5) $month_name         = 'Май';
        if ($month == 6) $month_name         = 'Июнь';
        if ($month == 7) $month_name         = 'Июль';
        if ($month == 8) $month_name         = 'Август';
        if ($month == 9) $month_name         = 'Сентябрь';
        if ($month == 10) $month_name        = 'Октябрь';
        if ($month == 11) $month_name        = 'Ноябрь';
        if ($month == 12) $month_name        = 'Декабрь';
        $year_up = null;
        $year_down = null;
        $month_up = null;
        $month_down = null;
        if ($month == 12)
        {
            $month_up                        = 1;
            $year_up                         = $year + 1;
        }


        if ($month == 1)
        {
            $month_down                      = 12;
            $year_down                       = $year - 1;
        }
        return [
            "month_name"        => $month_name,
            "year"              => $year,
            "year_up"           => $year_up ? $year_up : $year,
            "year_down"         => $year_down ? $year_down : $year,
            "month"             => $month,
            "month_up"          => $month_up ? $month_up : $month + 1,
            "month_down"        => $month_down ? $month_down : $month -1,
        ];
    }
    private function week_format(int $hall_id): void
    {
        foreach ($this->calendar as &$week)
        {
            foreach ($week as &$day)
            {
                if (count($day) > 0)
                {
                    $day['works'] = $this->_scheduleService->showByDate($hall_id, $day['date']);
                }
            }
        }
    }

    private function day_null_delete(): void
    {
        if (count($this->calendar[5][0]) == 0 && count($this->calendar[5][6]) == 0)
        {
            array_pop($this->calendar);
        }
    }
    private function push_month(Carbon $date, int $month, int $week): void
    {
        if ($date->month == $month)
        {
            array_push($this->calendar[$week], [
                'day'                       => $date->day,
                'date'                      => $date->toDateString(),
            ]);
        }
    }
    public function calendar(int $hall_id, int $day, int $month, int $year): array
    {
        $s = 0;

        for ($day = 1; $day <= $this->number_of_days; $day++) {
            $date = Carbon::createFromDate($year, $month, $day);
            $i = (int)Carbon::parse($date)->weekOfMonth - 1;

            if ($date->day == 1) {
            $this->format($date->isTuesday(), $s, 1);
            $this->format($date->isWednesday(), $s, 2);
            $this->format($date->isThursday(), $s, 3);
            $this->format($date->isFriday(), $s, 4);
            $this->format($date->isSaturday(), $s, 5);
            $this->format($date->isSunday(), $s, 6);

            $this->push_month($date, $month, 0);
            $s = 1;
            } else {
                if (count($this->calendar[$i]) == 7 && $date->day != 1) {
                    $i += 1;
                }
                try {
                    $this->push_month($date, $month, $i);
                } catch(TypeError) {}
            }
        }

        $this->add_void(4);
        $this->add_void(5);
        $this->week_format($hall_id);
        $this->day_null_delete();
        return [
            "calendar" => $this->calendar,
            "weeks" => $this->add_month($month, $year)
        ];
    }
}
