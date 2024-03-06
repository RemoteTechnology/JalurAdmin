<?php

namespace App\Http\Controllers;

use App\Http\Services\BillingService;
use App\Http\Services\RecordService;
use App\Http\Services\ScheduleService;
use App\Http\Services\TypeWorkoutService;
use App\Http\Services\UserService;
use App\Http\Services\WorkoutService;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Error\FatalError;

class BillingHistoryController extends Controller
{
    private RecordService $recordService;
    private UserService $userService;
    private ScheduleService $scheduleService;
    private TypeWorkoutService $typeWorkoutService;
    private WorkoutService $workoutService;
    private BillingService $billingService;
    public array $userForRecords;

    /**
     * @param RecordService $recordService
     * @param UserService $userService
     * @param ScheduleService $scheduleService
     * @param TypeWorkoutService $typeWorkoutService
     * @param WorkoutService $workoutService
     * @param BillingService $billingService
     * @return void
     */
    public function __construct(
        RecordService $recordService,
        UserService $userService,
        ScheduleService $scheduleService,
        TypeWorkoutService $typeWorkoutService,
        WorkoutService $workoutService,
        BillingService $billingService
    )
    {
        $this->recordService = $recordService;
        $this->userService = $userService;
        $this->scheduleService = $scheduleService;
        $this->typeWorkoutService = $typeWorkoutService;
        $this->workoutService = $workoutService;
        $this->billingService = $billingService;
        $this->userForRecords = array();
    }
    public function index()
    {
        $records = $this->recordService->all();
        foreach ($records as $record)
        {
            $schedule = $this->scheduleService->show($record->schedule_id);
            $workout = $this->workoutService->show($schedule->workout_id);
            $this->userForRecords[] = [
                'id' => $record->id,
                'record' => $record,
                'user' => $this->userService->show($record->user_id),
                'type_workout' => $this->typeWorkoutService->show($workout->type_workout_id),
                'workout' => $workout,
                'schedule' => $schedule,
                'couch' => $this->userService->show($schedule->couch_id),
                'billing' => $this->billingService->showByRecord($record->id)
            ];
        }
        echo '<pre>';
        var_dump($this->userForRecords);
        echo '</pre>';
        return view('billing.index', [
            "title" => "История покупок",
            'records' => $this->userForRecords
        ]);
    }
}
