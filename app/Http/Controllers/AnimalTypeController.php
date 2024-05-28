<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnimalTypeController extends Controller
{
    public function index()
    {
        try {
            $animalTypes = DB::select('SELECT * FROM animal_types');
            return response()->json(['success' => true, 'data' => $animalTypes]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $animalType = DB::select('SELECT * FROM animal_types WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $animalType]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $animalType = DB::insert('INSERT INTO animal_types (name) VALUES (?)', [$request->name]);
            return response()->json(['success' => true, 'data' => $animalType]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->has('name')) {
                $animalType = DB::update('UPDATE animal_types SET name = ? WHERE id = ?', [$request->name, $id]);
            }

            return response()->json(['success' => true, 'data' => $animalType]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $animalType = DB::delete('DELETE FROM animal_types WHERE id = ?', [$id]);
            return response()->json(['success' => true, 'data' => $animalType]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
