<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::orderBy('name')
            ->paginate(10);

        $types = Pet::select('type')
            ->whereNotNull('type')
            ->distinct()
            ->get()
            ->pluck('type');

        $races = Pet::select('race')
            ->whereNotNull('race')
            ->distinct()
            ->get()
            ->pluck('race');

        $statuts = Pet::select('statut')
            ->whereNotNull('statut')
            ->distinct()
            ->get()
            ->pluck('statut');

        return Inertia::render('Pet', [
            'propsPets' => $pets,
            'types' => $types,
            'races' => $races,
            'statuts' => $statuts
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'races' => 'array|nullable',
            'types' => 'array|nullable'
        ]);


        $query = Pet::query();

        if (!empty($request->races)) {
            $query->whereIn('race', $request->races);
        }

        if (!empty($request->types)) {
            $query->whereIn('type', $request->types);
        }

        if (!empty($request->statuts)) {
            $query->whereIn('statut', $request->statuts);
        }

        if (!empty($request->price_min)) {
            $query->where('price_ht', '>=', $request->price_min);
        }

        if (!empty($request->price_max)) {
            $query->where('price_ttc', '<=', $request->price_max);
        }

        $pets = $query->paginate(10);


        return response()->json($pets);
    }
}
