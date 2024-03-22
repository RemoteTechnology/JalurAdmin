<?php

namespace App\Http\Services;

use App\Http\Services\Contracts\AbonementServiceInterface;
use App\Models\Abonement;
use Illuminate\Database\Eloquent\Collection;

class AbonementService implements AbonementServiceInterface
{

    public function create(array $request): Abonement
    {
        return Abonement::create($request);
    }

    public function show(int $id): Abonement
    {
        return Abonement::find($id)->first();
    }

    public function all(): Collection
    {
        return Abonement::all();
    }

    public function update(Abonement $context, array $request): Abonement
    {
        $context->title = key_exists('title', $request) && !is_null($request['title']) ? $request['title'] : $context->title;
        $context->price = key_exists('price', $request) &&
            !is_null($request['price']) &&
            $request['price'] > 0 ? $request['price'] : $context->price;
        $context->save();
        return $context;
    }

    public function delete(Abonement $context): bool
    {
        return $context->delete();
    }
}
