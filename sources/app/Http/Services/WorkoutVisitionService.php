<?php

namespace App\Http\Services;

use App\Http\Services\Contracts\WorkoutVisitionServiceInterface;
use App\Models\Visition;
use Illuminate\Database\Eloquent\Collection;

class WorkoutVisitionService implements WorkoutVisitionServiceInterface
{
    public function create(string $contract_id, array $context): Collection
    {
        foreach (explode(",", $context['visition_date']) as $concrete_date)
        {
            if (strlen($concrete_date) > 0)
            {
                $workout_visition = new Visition();
                $workout_visition->contract_id = $contract_id;
                $workout_visition->visition_date = $concrete_date;
                $workout_visition->status = 'Ожидает';
                $workout_visition->save();
            }
        }
        return Visition::where('contract_id', $contract_id)->get();
    }

    public function show(int $id): Visition
    {
        return Visition::find($id);
    }

    public function showByContract(string $contract)
    {
        return Visition::where('contract', $contract);
    }

    public function all(): Collection
    {
        return Visition::all();
    }

    public function update(Visition $workout_visition, array $context): Visition
    {
        $workout_visition->contract_id = $context['contract_id'];
        $workout_visition->visition_date = $context['visition_date'];
        $workout_visition->status = $context['status'];
        $workout_visition->save();
        return $workout_visition;
    }

    public function delete(Visition $workout_visition): bool
    {
        return $workout_visition->delete();
    }
}
